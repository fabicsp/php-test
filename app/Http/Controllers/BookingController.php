<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    //
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'health_professional_id' => 'required|exists:health_professionals,id',
            'appointment_date' => 'required|date|after:now',
            'email' => 'required|email',
        ]);

        $booking = Booking::create([
            'service_id' => $request->service_id,
            'health_professional_id' => $request->health_professional_id,
            'appointment_date' => $request->appointment_date,
            'email' => $request->email,
        ]);



        // Prepare email but don't send it
        $this->prepareBookingEmail($booking);

        return response()->json([
            'message' => 'Booking successfully created!',
            'booking' => $booking
        ], 201);
    }

    // Method to prepare email but not send it
    protected function prepareBookingEmail($booking)
    {
        // Here we would normally send the email, but we’re just preparing it.
        // For example, we can queue the email or log the email data.
        // This is where you'd prepare the mail, but for now we will just log it.
        \Log::info('Booking confirmation email prepared for:', [
            'email' => $booking->email,
            'appointment_time' => $booking->appointment_date
        ]);
    }
}
