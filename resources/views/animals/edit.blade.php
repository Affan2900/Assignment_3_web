
@extends('layouts.master')

@section('title', 'Edit Animal - Wild Time Zoo')

@section('content')
<div class="container py-5">
    <h1 class="display-4 text-success mb-4 fw-bold">Edit Animal</h1>
    
    <form action="{{ route('animals.update', $animal->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $animal->name }}" required>
        </div>
        
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="5" required>{{ $animal->description }}</textarea>
        </div>
        
        <div class="mb-3">
            <label for="is_featured" class="form-label">Featured</label>
            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
        </div>
        
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
            @if($animal->image)
                <img src="{{ asset($animal->image) }}" alt="{{ $animal->name }}" class="img-fluid mt-3" style="height: 200px; object-fit: cover;">
            @endif
        </div>
        
        <button type="submit" class="btn btn-success">Update Animal</button>
    </form>
</div>
@endsection