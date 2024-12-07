<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display the contact page
     */
    public function index()
    {
        return view('contact.index');
    }

    /**
     * Handle contact form submission
     */
    public function submit(Request $request)
    {
        // Validate contact form inputs
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000'
        ]);

        // Create a contact submission record
        $submission = ContactSubmission::create($validatedData);

        // Send email notification
        try {
            Mail::send('emails.contact-notification', ['submission' => $submission], function ($message) use ($submission) {
                $message->to(config('zoo.admin_email', 'admin@wildtimezoo.com'))
                    ->subject('New Contact Form Submission');
            });
        } catch (\Exception $e) {
            // Log email sending error
            \Log::error('Contact form email could not be sent: ' . $e->getMessage());
        }

        // Send confirmation to the user
        try {
            Mail::send('emails.contact-confirmation', ['submission' => $submission], function ($message) use ($submission) {
                $message->to($submission->email)
                    ->subject('We received your message');
            });
        } catch (\Exception $e) {
            // Log confirmation email error
            \Log::error('Contact confirmation email could not be sent: ' . $e->getMessage());
        }

        return redirect()->route('contact.index')
            ->with('success', 'Your message has been sent successfully! We will get back to you soon.');
    }
}
