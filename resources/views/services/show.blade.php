@extends('layouts.master')

@section('title', $service->name . ' - Service Details')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <img 
                src="{{ asset($service->image) }}"
                class="img-fluid rounded shadow-lg" 
                alt="{{ $service->name }}"
                style="max-height: 500px; object-fit: cover;"
            >
        </div>
        
        <div class="col-md-6">
            <div class="mb-4">
                <h1 class="display-5 mb-3">{{ $service->name }}</h1>
                
                @if($service->is_featured)
                    <span class="badge bg-warning text-dark mb-3">Featured Service</span>
                @endif
                
                <p class="lead text-muted">
                    {{ $service->description }}
                </p>
            </div>
            
            <div class="bg-light p-4 rounded">
                <h3 class="mb-3">Service Details</h3>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <strong>Price:</strong> 
                        <span class="text-primary h5 mb-0">
                            ${{ number_format($service->price, 2) }}
                        </span>
                    </li>
                    <li class="mb-2">
                        <strong>Duration:</strong> 
                        {{ $service->duration }} minutes
                    </li>
                </ul>
            </div>
            
            <div class="mt-4">
                @auth
                    <a 
                        href="{{ route('contact.index') }}" 
                        class="btn btn-primary btn-lg"
                    >
                        Book This Service
                    </a>
                @else
                    <div class="alert alert-info" role="alert">
                        Please <a href="{{ route('login') }}">login</a> to book this service.
                    </div>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection