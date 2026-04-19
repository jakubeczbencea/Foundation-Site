<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\Webhook;
use Illuminate\Support\Facades\Log;

class StripeController extends Controller
{
    public function checkout(Request $request)
    {
        $request->validate([
            'donor_name' => 'required|string|max:255',
            'donor_email' => 'required|email',
            'amount' => 'required|numeric|min:1000',
            'goal' => 'nullable|string',
        ]);

        Stripe::setApiKey(config('services.stripe.secret'));

        $donation = Donation::create([
            'donor_name' => $request->donor_name,
            'donor_email' => $request->donor_email,
            'amount' => $request->amount,
            'currency' => 'HUF',
            'payment_method' => 'card',
            'status' => 'pending',
            'message' => $request->message,
            'is_anonymous' => $request->has('anonymous'),
            'newsletter' => $request->has('newsletter'),
        ]);

        $checkoutSession = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'huf',
                    'product_data' => [
                        'name' => 'Adomány: ' . ($request->goal ?: 'Általános támogatás'),
                    ],
                    'unit_amount' => $request->amount * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('donation.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('donation.cancel'),
            'metadata' => [
                'donation_id' => $donation->id,
            ],
            'customer_email' => $request->donor_email,
        ]);

        $donation->update(['transaction_id' => $checkoutSession->id]);

        return redirect($checkoutSession->url);
    }

    public function success(Request $request)
    {
        return view('donation_success');
    }

    public function cancel()
    {
        return view('donation_cancel');
    }

    public function webhook(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $endpoint_secret = config('services.stripe.webhook_secret');

        $payload = $request->getContent();
        $sig_header = $request->header('Stripe-Signature');

        try {
            $event = Webhook::constructEvent(
                $payload, $sig_header, $endpoint_secret
            );
        } catch (\UnexpectedValueException $e) {
            return response()->json(['error' => 'Invalid payload'], 400);
        } catch (\Stripe\Exception\SignatureVerificationException $e) {
            return response()->json(['error' => 'Invalid signature'], 400);
        }

        if ($event->type === 'checkout.session.completed') {
            $session = $event->data->object;
            $donationId = $session->metadata->donation_id;

            $donation = Donation::find($donationId);
            if ($donation) {
                $donation->update(['status' => 'completed']);
            }
        }

        return response()->json(['status' => 'success']);
    }
}
