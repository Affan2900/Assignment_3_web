@extends('layouts.master')

@section('title', 'Our Services - Animal Shelter')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-4">Our Professional Services</h1>
        <p class="lead text-muted">
            Comprehensive care and support for your beloved pets
        </p>
    </div>
    
    <div class="row">
        @forelse($services as $service)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-img-top overflow-hidden position-relative">
                        @if($service->is_featured)
                            <span class="badge bg-warning text-dark position-absolute top-0 end-0 m-2">
                                Featured
                            </span>
                        @endif
                        
                        <img 
                            src="{{ asset($service->image) }}"
                            class="img-fluid w-100" 
                            alt="{{ $service->name }}"
                            style="height: 250px; object-fit: cover;"
                        >
                    </div>
                    
                    <div class="card-body">
                        <h5 class="card-title">{{ $service->name }}</h5>
                        <p class="card-text text-muted">
                            {{ Str::limit($service->description, 150) }}
                        </p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="h5 mb-0 text-primary">
                                ${{ number_format($service->price, 2) }}
                            </span>
                            <a 
                                href="{{ route('services.show', $service->id) }}" 
                                class="btn btn-outline-primary btn-sm"
                            >
                                Learn More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <div class="alert alert-info" role="alert">
                    <h4 class="alert-heading">No Services Available</h4>
                    <p>We're currently updating our services. Please check back soon!</p>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection

@push('styles')
<style>
    .card:hover {
        transform: translateY(-10px);
        transition: transform 0.3s ease;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
</style>
@endpush