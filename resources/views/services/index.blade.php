@extends('layouts.master')

@section('title', 'Our Services - Animal Shelter')

@section('content')
<div class="container">
    <h1 class="mt-4">Our Services</h1>
    
    <div class="row">
        @forelse($services as $service)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    @if($service->image)
                        <img src="{{ asset('storage/' . $service->image) }}" class="card-img-top" alt="{{ $service->name }}">
                    @else
                        <img src="{{ asset('images/placeholder-service.jpg') }}" class="card-img-top" alt="Service Placeholder">
                    @endif
                    
                    <div class="card-body">
                        <h5 class="card-title">{{ $service->name }}</h5>
                        <p class="card-text">{{ Str::limit($service->description, 150) }}</p>
                        <a href="{{ route('services.show', $service->id) }}" class="btn btn-primary">Learn More</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="alert alert-info">No services available at the moment.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection