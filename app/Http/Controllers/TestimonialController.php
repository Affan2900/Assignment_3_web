<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the testimonials.
     */
    public function index()
{
    // Retrieve and paginate the testimonials
    $testimonials = Testimonial::paginate(10);

    return view('testimonials.index', compact('testimonials'));
}

    /**
     * Show the form for creating a new testimonial.
     */
    public function create()
    {
        return view('testimonials.create');
    }

    /**
     * Store a newly created testimonial in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:1000',
        ]);

        $testimonial = new Testimonial($validated);
        $testimonial->user_id = Auth::id();
        $testimonial->save();

        return redirect()->route('testimonials.index')->with('success', 'Testimonial created successfully');
    }

    /**
     * Show the form for editing the specified testimonial.
     */
    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        if (auth()->id() !== $testimonial->user_id) {
            abort(403, 'Unauthorized action.');
        }

        return view('testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified testimonial in storage.
     */
    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        if (auth()->id() !== $testimonial->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:1000',
        ]);

        $testimonial->update($validated);

        return redirect()->route('testimonials.index')->with('success', 'Testimonial updated successfully');
    }

    /**
     * Remove the specified testimonial from storage.
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        if ($testimonial->user_id !== Auth::id()) {
            return redirect()->route('testimonials.index')
                ->with('error', 'You are not authorized to delete this testimonial');
        }

        $testimonial->delete();

        return redirect()->route('testimonials.index')
            ->with('success', 'Your testimonial has been removed successfully');
    }
}
