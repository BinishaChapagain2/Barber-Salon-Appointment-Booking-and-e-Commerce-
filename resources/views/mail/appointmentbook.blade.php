<!DOCTYPE html>
<html>

<head>
    <title>Appointment Booked Sucessfully </title>
</head>

<body>
    <h1>Appointment Booked Sucessfully</h1>
    <p>Dear {{ $name }},</p>
    <p>We are pleased to inform you that your appointment has been Booked Sucessfully:</p>

    <p>Appointment Details:</p>

    <p>Appointment Date: {{ $appointment_date }}</p>
    <p>Appointment Time: {{ $appointment_time }}</p>
    <p>Total Cost:Rs. {{ $total_price }}</p>


    <p>If you have any questions or need to reschedule, feel free to contact us at any time.</p>
    <p>Best regards,</p>
    <p>Gentelman Barber Shop</p>
</body>

</html>
