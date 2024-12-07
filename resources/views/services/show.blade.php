@extends('layouts.master')

@section('title', $service->name . ' - Service Details')

@section('content')
<div class="container">
    <h1 class="mt-4">{{ $service->name }}</h1>
    
    <div class="row">
        <div class="col-md-6">
            @if($service->image)
                <img src="{{ asset('storage/' . $service->image) }}" class="img-fluid rounded" alt="{{ $service->name }}">
            @else
                <img src="{{ asset('images/placeholder-service.jpg') }}" class="img-fluid rounded" alt="Service Placeholder">
            @endif
        </div>
        
        <div class="col-md-6">
            <h2>Service Description</h2>
            <p>{{ $service->description }}</p>
            
            <h3>Details</h3>
            <ul>
                <li><strong>Price:</strong> ${{ number_format($service->price, 2) }}</li>
                <li><strong>Duration:</strong> {{ $service->duration }} minutes</li>
            </ul>
            
            @auth
                <a href="{{ route('contact.index') }}" class="btn btn-primary">Book This Service</a>
            @endauth
        </div>
    </div>
</div>
@endsection