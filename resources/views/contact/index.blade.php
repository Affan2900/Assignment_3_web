@extends('layouts.master')

@section('title', 'Contact Us - Wild Time Zoo')

@section('content')
<div class="container py-5">
    <h1 class="display-4 text-success mb-4">Contact Us</h1>
    
    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card border-success shadow-sm">
                <div class="card-body">
                    <h2 class="card-title h3 text-success mb-3">Send Us a Message</h2>
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control" id="phone" name="phone">
                        </div>
                        
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <select class="form-select" id="subject" name="subject" required>
                                <option value="">Select a Subject</option>
                                <option value="visit">Plan a Visit</option>
                                <option value="education">Educational Programs</option>
                                <option value="donation">Make a Donation</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="message" class="form-label">Your Message</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-success">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6">
            <div class="card border-success shadow-sm mb-4">
                <div class="card-body">
                    <h3 class="card-title h4 text-success mb-3">Contact Information</h3>
                    <address>
                        <strong>Wild Time Zoo</strong><br>
                        123 Zoo Lane<br>
                        Wildtown, USA 12345<br>
                        <br>
                        <i class="bi bi-telephone-fill text-success me-2"></i> <strong>Phone:</strong> (555) 123-4567<br>
                        <i class="bi bi-envelope-fill text-success me-2"></i> <strong>Email:</strong> info@wildtimezoo.org
                    </address>
                </div>
            </div>
            
            <div class="card border-success shadow-sm">
                <div class="card-body">
                    <h3 class="card-title h4 text-success mb-3">Zoo Hours</h3>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-clock-fill text-success me-2"></i>Monday - Friday: 9:00 AM - 6:00 PM</li>
                        <li><i class="bi bi-clock-fill text-success me-2"></i>Saturday - Sunday: 10:00 AM - 7:00 PM</li>
                        <li><i class="bi bi-info-circle-fill text-success me-2"></i>Last admission 1 hour before closing</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card {
        transition: transform 0.3s, box-shadow 0.3s;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
</style>
@endpush

