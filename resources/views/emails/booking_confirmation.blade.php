<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Booking Confirmation</title>
</head>
<body style="font-family: Arial, sans-serif; background-color:#f4f4f4; padding:20px;">

    <div style="max-width:600px; margin:auto; background:white; padding:30px; border-radius:8px;">
        
        <h2 style="color:#2c3e50;">Booking Confirmation</h2>

        <p>Dear {{ $booking->customer->name }},</p>

        <p>
            We are pleased to inform you that your booking has been successfully confirmed. 
            Thank you for choosing our hotel — we truly appreciate your trust in us.
        </p>

        <hr>

        <h3 style="color:#34495e;">Booking Details</h3>
        @php
     
            $totalDays = $booking->checked_in->diffInDays($booking->checked_out);
            $pricePerNight = (int) str_replace('$', '', $booking->room->price);
            $totalAmount = $totalDays * $pricePerNight;
        @endphp
        <p><strong>Booking ID:</strong> #{{ $booking->id }}</p>
        <p><strong>Room:</strong> {{ ucfirst($booking->room->room_type)  }} Bed</p>
        <p><strong>Check in Date:</strong> {{ $booking->checked_in->format('d M Y') }}</p>
        <p><strong>Check out Date:</strong> {{ $booking->checked_out->format('d M Y') }}</p>
        <p><strong>Total Days:</strong> {{ $totalDays }}</p>
        <p><strong>Price per Night:</strong> {{ $booking->room->price }}</p>
        <p><strong>Total Amount Paid:</strong> ${{ number_format($totalAmount, 2) }}</p>

        <hr>

        <p>
            Please ensure you arrive at the hotel with a valid identification document.
            If you need to modify or cancel your reservation, kindly contact us at least 
            24 hours before your check-in date.
        </p>

        <p>
            If you have any questions or special requests, feel free to contact our support team.
        </p>

        <br>

        <p>We look forward to welcoming you!</p>

        <p style="margin-top:30px;">
            Warm regards,<br>
            <strong>{{ config('app.name') }}</strong><br>
            Customer Support Team<br>
            Email: support@umbrella.com<br>
            Phone: +1 234 567 890
        </p>

    </div>

</body>
</html>