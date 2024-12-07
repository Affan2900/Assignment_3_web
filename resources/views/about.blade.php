@extends('layouts.master')

@section('title', 'About Us - Animal Shelter')

@section('content')
<div class="container">
    <h1 class="mt-4">About Our Animal Shelter</h1>
    <div class="row">
        <div class="col-md-8">
            <h2>Our Story</h2>
            <p>
                Founded in 2024, our animal shelter has been committed to providing compassionate care 
                and finding forever homes for animals in need. We believe every animal deserves love, 
                respect, and a chance at a happy life.
            </p>
            
            <h2>Our Mission</h2>
            <ul>
                <li>Rescue and rehabilitate animals</li>
                <li>Provide medical care and shelter</li>
                <li>Find loving homes for our animals</li>
                <li>Educate the community about responsible pet ownership</li>
            </ul>
        </div>
        <div class="col-md-4">
            <h3>Contact Information</h3>
            <address>
                123 Shelter Lane<br>
                Anytown, USA 12345<br>
                Phone: (555) 123-4567<br>
                Email: info@animalshelter.org
            </address>
        </div>
    </div>
</div>
@endsection