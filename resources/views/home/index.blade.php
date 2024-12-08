@extends('layouts.master')

@section('title', 'Home - Animal Shelter')

@section('content')
<div class="container py-5">
    <h1 class="display-4 text-success mb-4 fw-bold">Welcome to Wild Time Zoo</h1>
    <div class="row">
        <div class="col-lg-8">
            <p class="lead mb-4">
                At Wild Time Zoo, we are dedicated to inspiring a love for wildlife through education, conservation, and unforgettable experiences. Our mission is to create a safe haven for endangered species while fostering a connection between our visitors and the natural world to promote environmental stewardship.
            </p>
            
            <h2 class="h3 text-success mb-3 fw-bold">Featured Animals</h2>
            <div class="card shadow-sm">
                <div class="card-body">
                    @include('animals.featured')
                </div>
            </div>
        </div>
        <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="card bg-light-green">
                <div class="card-body">
                    <h3 class="h4 card-title mb-3">Quick Links</h3>
                    @include('components.quick-links')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .featured-animal {
        margin-bottom: 1.25rem;
    }
    .featured-animal:last-child {
        margin-bottom: 0;
    }
    .bg-light-green {
        background-color: #e8f5e9;
    }
</style>
@endpush
