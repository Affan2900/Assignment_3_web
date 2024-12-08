@extends('layouts.master')

@section('title', 'Our Animals - Wild Time Zoo')

@section('content')
<div class="container py-5">
    <h1 class="display-4 text-success mb-4">Our Animal Friends</h1>
    
    <div class="row g-4">
        @forelse($animals as $animal)
            <div class="col-sm-6 col-lg-4">
                <div class="card h-100 shadow-sm border-success">
                    @if($animal->image)
                        <img src="{{ asset('storage/' . $animal->image) }}" class="card-img-top" alt="{{ $animal->name }}" style="height: 200px; object-fit: cover;">
                    @else
                        <img src="{{ asset('images/placeholder-animal.jpg') }}" class="card-img-top" alt="Placeholder" style="height: 200px; object-fit: cover;">
                    @endif
                    
                    <div class="card-body">
                        <h5 class="card-title text-success">{{ $animal->name }}</h5>
                        <p class="card-text">
                            <span class="badge bg-light text-success mb-1">{{ $animal->species }}</span><br>
                            <small class="text-muted">
                                <strong>Age:</strong> {{ $animal->age }} years<br>
                                <strong>Breed:</strong> {{ $animal->breed }}
                            </small>
                        </p>
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


