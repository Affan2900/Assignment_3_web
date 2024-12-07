@extends('layouts.master')

@section('title', 'Contact Us - Animal Shelter')

@section('content')
<div class="container">
    <h1 class="mt-4">Contact Us</h1>
    
    <div class="row">
        <div class="col-md-6">
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
                        <option value="adoption">Adoption Inquiry</option>
                        <option value="service">Service Inquiry</option>
                        <option value="donation">Donation</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="message" class="form-label">Your Message</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
        
        <div class="col-md-6">
            <h3>Contact Information</h3>
            <address>
                <strong>Animal Shelter Headquarters</strong><br>
                123 Rescue Lane<br>
                Anytown, USA 12345<br>
                <br>
                <strong>Phone:</strong> (555) 123-4567<br>
                <strong>Email:</strong> info@animalshelter.org
            </address>
            
            <h3>Business Hours</h3>
            <ul class="list-unstyled">
                <li>Monday - Friday: 9:00 AM - 6:00 PM</li>
                <li>Saturday: 10:00 AM - 4:00 PM</li>
                <li>Sunday: Closed</li>
            </ul>
        </div>
    </div>
</div>
@endsection