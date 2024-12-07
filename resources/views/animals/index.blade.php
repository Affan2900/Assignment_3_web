
@extends('layouts.master')

@section('title', 'Our Animals - Animal Shelter')

@section('content')
<div class="container">
    <h1 class="mt-4">Available Animals</h1>
    
    <div class="row">
        @forelse($animals as $animal)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if($animal->image)
                        <img src="{{ asset('storage/' . $animal->image) }}" class="card-img-top" alt="{{ $animal->name }}">
                    @else
                        <img src="{{ asset('images/placeholder-animal.jpg') }}" class="card-img-top" alt="Placeholder">
                    @endif
                    
                    <div class="card-body">
                        <h5 class="card-title">{{ $animal->name }}</h5>
                        <p class="card-text">
                            <strong>Species:</strong> {{ $animal->species }}<br>
                            <strong>Age:</strong> {{ $animal->age }} years<br>
                            <strong>Breed:</strong> {{ $animal->breed }}
                        </p>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="alert alert-info">No animals available at the moment.</p>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {{ $animals->links() }}
    </div>
</div>
@endsection

@push('styles')
<style>
    .card {
        transition: transform 0.3s;
    }
    .card:hover {
        transform: scale(1.05);
    }
</style>
@endpush