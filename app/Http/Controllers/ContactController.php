<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(ContactRequest $request)
    {
        $validated = $request->validated();

        // Email küldés adminnak
        Mail::raw("Új üzenet a kapcsolati űrlapról:\n\nNév: {$validated['name']}\nEmail: {$validated['email']}\nTárgy: {$validated['subject']}\n\nÜzenet:\n{$validated['message']}", function ($message) use ($validated) {
            $message->to(config('mail.from.address'))
                    ->subject("Új üzenet: {$validated['subject']}")
                    ->replyTo($validated['email']);
        });

        return back()->with('success', 'Üzenetedet sikeresen elküldtük! Hamarosan kapcsolatba lépünk veled.');
    }
}
