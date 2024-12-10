@extends('layouts.master')

@section('title', 'Testimonials - Animal Shelter')

@section('content')
<div class="container">
    <h1 class="mt-4">Testimonials</h1>
    
    @auth
        <div class="mb-3">
            <a href="{{ route('testimonials.create') }}" class="btn btn-success">Submit a Testimonial</a>
        </div>
    @endauth
    
    <div class="row">
        @forelse($testimonials as $testimonial)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $testimonial->title }}</h5>
                        <p class="card-text">{{ Str::limit($testimonial->content, 200) }}</p>
                        
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                By {{ $testimonial->user->name }} 
                                on {{ $testimonial->created_at->format('M d, Y') }}
                            </small>
                            
                            @if($testimonial->rating)
                                <div class="rating">
                                    @for($i = 1; $i <= 5; $i++)
                                        <span class="star {{ $i <= $testimonial->rating ? 'text-warning' : 'text-muted' }}">★</span>
                                    @endfor
                                </div>
                            @endif
                        </div>
                        
                        @auth
                            @if(auth()->id() == $testimonial->user_id)
                                <div class="mt-2">
                                    <a href="{{ route('testimonials.edit', $testimonial->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="alert alert-info">No testimonials available yet.</p>
            </div>
        @endforelse
    </div>

    {{-- Pagination --}}
@if ($testimonials->hasPages())
<nav class="d-flex justify-content-center mt-4">
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($testimonials->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">&laquo; Previous</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $testimonials->previousPageUrl() }}" rel="prev">&laquo; Previous</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($testimonials->links()->elements[0] as $page => $url)
            @if ($page == $testimonials->currentPage())
                <li class="page-item active" aria-current="page">
                    <span class="page-link">{{ $page }}</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($testimonials->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $testimonials->nextPageUrl() }}" rel="next">Next &raquo;</a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link">Next &raquo;</span>
            </li>
        @endif
    </ul>
</nav>
@endif

</div>
@endsection

@push('styles')
<style>
    .star {
        font-size: 1.2rem;
    }
</style>
@endpush