<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\Webhook;
use Stripe\Exception\SignatureVerificationException;

class PaymentController extends Controller
{
    public function checkout($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);

        Stripe::setApiKey(config('services.stripe.secret'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'mode' => 'payment',

            'line_items' => [[
                'price_data' => [
                    'currency' => 'myr',
                    'product_data' => [
                        'name' => 'Car Booking #' . $booking->id,
                    ],
                    'unit_amount' => $booking->total_price * 100,
                ],
                'quantity' => 1,
            ]],

            'metadata' => [
                'booking_id' => $booking->id,
            ],

            'success_url' => route('payment.success', $booking->id),
            'cancel_url' => route('payment.cancel', $booking->id),
        ]);

        return redirect($session->url);
    }

    public function success($bookingId)
    {

        return redirect()->route('bookings.show', $bookingId)
            ->with('success', 'Payment successful');
    }

    public function cancel($bookingId)
    {
        return redirect()->route('bookings.show', $bookingId)
            ->with('error', 'Payment cancelled');
    }

    public function webhook(Request $request)
    {
        $payload = $request->getContent();
        $signature = $request->header('Stripe-Signature');
        $secret = config('services.stripe.webhook_secret');

        try {
            $event = Webhook::constructEvent(
                $payload,
                $signature,
                $secret
            );
        } catch (\UnexpectedValueException $e) {
            return response()->json(['error' => 'Invalid payload'], 400);
        } catch (SignatureVerificationException $e) {
            return response()->json(['error' => 'Invalid signature'], 400);
        }

        if ($event->type === 'checkout.session.completed') {
            $session = $event->data->object;

            $bookingId = $session->metadata->booking_id ?? null;

            if ($bookingId) {
                $booking = Booking::find($bookingId);

                if ($booking) {
                    $booking->status = 'paid';
                    $booking->save();

                    $booking->car->update([
                        'status' => 'reserved'
                    ]);
                }
            }
        }

        return response()->json(['status' => 'success']);
    }
}