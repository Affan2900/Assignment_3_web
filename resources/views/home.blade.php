@extends('layouts.master')

@section('title', 'Home - Animal Shelter')

@section('content')
<div class="container">
    <h1 class="mt-4">Welcome to Our Animal Shelter</h1>
    <div class="row">
        <div class="col-md-8">
            <p>
                We are dedicated to providing care, shelter, and loving homes for animals in need. 
                Our mission is to rescue, rehabilitate, and rehome animals while promoting responsible pet ownership.
            </p>
            
            <h2>Featured Animals</h2>
            @include('animals.featured')
        </div>
        <div class="col-md-4">
            @include('components.quick-links')
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .featured-animal {
        margin-bottom: 20px;
    }
</style>
@endpush