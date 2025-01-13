<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use App\Models\Category;
use App\Models\contact;
use App\Models\course;
use App\Models\order;
use App\Models\product;
use App\Models\service;
use App\Models\servicecategory;
use App\Models\staff;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function dashboard()
    {

        $categories = Category::count();
        $products = product::count();
        $staffs = staff::count();
        $courses = course::count();
        $servicescategory = servicecategory::count();
        $services = service::count();
        $appointments = appointment::count();
        $enquiry = contact::count();
        $order = order::count();

        // I want to face the total number of the count from the database table named users which role is user only

        $users = User::where('role', 'user')->count();



        $pending = order::where('status', 'pending')->count();
        $processing = order::where('status', 'approved')->count();
        $completed = order::where('status', 'completed')->count();
        $shipping = order::where('status', 'shipping')->count();


        return view('dashboard', compact('users', 'categories', 'products', 'staffs', 'courses', 'servicescategory', 'services', 'enquiry', 'appointments', 'order', 'pending', 'processing', 'completed', 'shipping'));
    }
}
