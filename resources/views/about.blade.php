@extends('layouts.master')

@section('title', 'About Us - Wild Time Zoo')

@section('content')
<div class="container py-5">
    <h1 class="display-4 text-success mb-4">About Our Wild Time Zoo</h1>
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-success shadow-sm">
                <div class="card-body">
                    <h2 class="card-title h3 text-success mb-3">Our Story</h2>
                    <p class="card-text">
                        Founded in 2024, Wild Time Zoo has been committed to providing compassionate care 
                        and creating unforgettable experiences for visitors while conserving wildlife. We believe every animal 
                        deserves love, respect, and a natural habitat to thrive in.
                    </p>
                    
                    <h2 class="card-title h3 text-success mb-3 mt-4">Our Mission</h2>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item bg-transparent"><i class="bi bi-check-circle-fill text-success me-2"></i>Conserve and protect endangered species</li>
                        <li class="list-group-item bg-transparent"><i class="bi bi-check-circle-fill text-success me-2"></i>Provide world-class care for our animals</li>
                        <li class="list-group-item bg-transparent"><i class="bi bi-check-circle-fill text-success me-2"></i>Educate visitors about wildlife and conservation</li>
                        <li class="list-group-item bg-transparent"><i class="bi bi-check-circle-fill text-success me-2"></i>Conduct research to benefit animals in the wild</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card border-success shadow-sm">
                <div class="card-body">
                    <h3 class="card-title h4 text-success mb-3">Contact Information</h3>
                    <address>
                        <strong>Wild Time Zoo</strong><br>
                        123 Zoo Lane<br>
                        Wildtown, USA 12345<br>
                        <br>
                        <i class="bi bi-telephone-fill text-success me-2"></i> (555) 123-4567<br>
                        <i class="bi bi-envelope-fill text-success me-2"></i> info@wildtimezoo.org
                    </address>
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
