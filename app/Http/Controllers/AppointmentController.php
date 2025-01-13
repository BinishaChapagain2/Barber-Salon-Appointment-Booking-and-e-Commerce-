<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{

    // User view appointments

    public function index()
    {
        // Fetch all appointments with related services and staff for the authenticated user only
        $appointments = Appointment::where('user_id', Auth::id())->with(['user', 'services'])->get();

        return view('appointment.index', compact('appointments'));
    }

    public function create()
    {
        $servicecategories = ServiceCategory::orderBy('priority')->get();
        $staffs = Staff::all();
        $user = Auth::user(); // Fetch the authenticated user

        return view('appointment.create', compact('servicecategories', 'staffs', 'user'));
    }

    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'staff_id' => 'required|exists:staff,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'notes' => 'nullable|string',
            'services' => 'required|array', // Validate as an array
            'services.*' => 'exists:services,id', // Validate each service ID
        ]);

        // Calculate the total price for the selected services
        $totalPrice = $this->calculateTotalPrice($validated['services']);

        // make sure that appointment date is not in the past date and time is not in the past time then current time and date
        if ($validated['appointment_date'] < date('Y-m-d')) {
            return back()->with('success', 'Appointment date should not be in the past.');
        }

        // Create the appointment
        $appointment = Appointment::create([
            'staff_id' => $validated['staff_id'],
            'appointment_date' => $validated['appointment_date'],
            'appointment_time' => $validated['appointment_time'],
            'notes' => $validated['notes'],
            'user_id' => Auth::id(), // Get the authenticated user's ID directly
            'total_price' => $totalPrice, // Set the calculated total price
        ]);

        // Attach services to the appointment using the pivot table
        $appointment->services()->attach($validated['services']);


        // Send mail to user

        $data = [
            'name' => Auth::user()->name,
            'appointment_date' => $validated['appointment_date'],
            'appointment_time' => $validated['appointment_time'],
            'total_price' => $totalPrice,
        ];

        Mail::send('mail.appointmentbook', $data, function ($message) {
            $message->to(Auth::user()->email, Auth::user()->name)
                ->subject('Appointment Booked');
        });









        return redirect()->route('appointment.index')->with('success', 'Appointment Booked successfully!');
    }

    public function edit($id)
    {
        $appointment = Appointment::with('services')->find($id);
        $servicecategories = ServiceCategory::orderBy('priority')->get();

        $services = Service::all();

        $staffs = Staff::all();

        return view('appointment.edit', compact('appointment', 'servicecategories', 'staffs', 'services'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $validated = $request->validate([
            'staff_id' => 'required|exists:staff,id',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
            'notes' => 'nullable|string',
            'services' => 'required|array', // Validate as an array
            'services.*' => 'exists:services,id', // Validate each service ID
        ]);

        // Calculate the total price for the selected services
        $totalPrice = $this->calculateTotalPrice($validated['services']);

        // Find the appointment
        $appointment = Appointment::findOrFail($id);

        // make sure that appointment date is not in past
        if ($validated['appointment_date'] < date('Y-m-d')) {
            return back()->with('success', 'Appointment date should not be in the past.');
        }

        // make sure that appointment time is not in past
        if ($validated['appointment_date'] == date('Y-m-d') && $validated['appointment_time'] < date('H:i')) {
            return back()->with('success', 'Appointment time should not be in the past.');
        }

        //make sure that not able to update the appointment if appointment time is less then 1hrs appointment time
        if ($validated['appointment_date'] == date('Y-m-d') && $validated['appointment_time'] < date('H:i', strtotime('+1 hour'))) {
            return back()->with('success', 'Appointment time should be atleast 1 hour from now.');
        }




        // Update the appointment
        $appointment->update([
            'staff_id' => $validated['staff_id'],
            'appointment_date' => $validated['appointment_date'],
            'appointment_time' => $validated['appointment_time'],
            'notes' => $validated['notes'],
            'total_price' => $totalPrice, // Set the calculated total price
        ]);

        // Sync services to the appointment using the pivot table
        $appointment->services()->sync($validated['services']);

        // Send mail to user

        $data = [
            'name' => Auth::user()->name,
            'appointment_date' => $validated['appointment_date'],
            'appointment_time' => $validated['appointment_time'],
            'total_price' => $totalPrice,
        ];

        Mail::send('mail.appointmentupdate', $data, function ($message) {
            $message->to(Auth::user()->email, Auth::user()->name)
                ->subject('Appointment Updated');
        });

        return redirect()->route('appointment.index')->with('success', 'Appointment updated successfully!');
    }

    public function delete(Request $request)
    {
        $appointment = Appointment::findOrFail($request->id); // Use findOrFail

        $appointment->delete();

        // Send mail to user

        $data = [
            'name' => Auth::user()->name,
            'appointment_date' => $appointment->appointment_date,
            'appointment_time' => $appointment->appointment_time,
        ];

        Mail::send('mail.appointmentdelete', $data, function ($message) {
            $message->to(Auth::user()->email, Auth::user()->name)
                ->subject('Appointment Deleted');
        });

        if (Auth::user()->role == 'admin') {
            return redirect()->route('appointment.adminviewappointment')->with('success', 'Appointment deleted successfully.');
        } else {
            return redirect()->route('appointment.index')->with('success', 'Appointment deleted successfully.');
        }
    }



    private function calculateTotalPrice($serviceIds)
    {
        $totalPrice = 0;

        foreach ($serviceIds as $serviceId) {
            $service = Service::findOrFail($serviceId);
            $totalPrice += $service->discounted_price ?? $service->price; // Use discounted price if available
        }

        return $totalPrice;
    }



    // Admin view appointments

    public function show()
    {
        // Fetch all appointments with related services and staff
        $appointments = Appointment::with('services', 'staff', 'user')->get();

        // Pass appointments data to the Blade view
        return view('appointment.adminviewappointment', compact('appointments'));
    }

    //Admin status update
    public function status($id, $status)
    {
        $appointment = appointment::find($id);
        $appointment->status = $status;
        $appointment->save();
        //send mail to user
        $data = [
            'name' => $appointment->name,
            'status' => $status,
        ];
        Mail::send('mail.appointment', $data, function ($message) use ($appointment) {
            $message->to($appointment->user->email, $appointment->name)
                ->subject('appointment Status');
        });
        return back()->with('success', 'appointment is now ' . $status);
    }
}
