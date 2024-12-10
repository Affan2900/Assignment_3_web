@extends('layouts.master')

@section('title', 'Our Animals - Wild Time Zoo')

@section('content')
<div class="container py-5">
    <h1 class="display-4 text-success mb-4 fw-bold">Our Animal Friends</h1>
    
    <div class="row g-4">
        @forelse($animals as $animal)
            <div class="col-sm-6 col-lg-4">
                <div class="card h-100 shadow-sm border-success">
                    <!-- Placeholder for image -->
                    <img 
            src="{{ asset($animal->image) }}"
            class="card-img-top" 
            alt="{{ $animal->name }}" 
            style="height: 200px; object-fit: cover;" 
        >
                    
                    <div class="card-body">
                        <h5 class="card-title text-success fs-3">{{ $animal->name }}</h5>
                        <p class="card-text">{{ $animal->description }}</p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info" role="alert">
                    <i class="bi bi-info-circle me-2"></i>No animals available at the moment. Check back soon!
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
