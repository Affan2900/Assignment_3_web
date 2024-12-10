<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Animal;
use Illuminate\Support\Facades\Storage;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::where('is_featured', true)->paginate(9);
        return view('animals.index', compact('animals'));
    }

    public function create()
    {
        return view('animals.create');
    }

    public function store(Request $request)
{
    \Log::info('Store method called.');
    \Log::info('Request data:', $request->all());

    try {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'is_featured' => 'boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    } catch (\Illuminate\Validation\ValidationException $e) {
        \Log::error('Validation failed:', $e->errors());
        return back()->withErrors($e->errors())->withInput();
    }

    \Log::info('Validation passed.', $validatedData);

    // Step 2: Handle image upload
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('animals', 'public');
        \Log::info('Image uploaded to:', ['path' => $imagePath]);
    } else {
        $imagePath = 'default.jpg';
        \Log::info('Default image used.');
    }
    $validatedData['image'] = $imagePath;

    // Step 3: Create the animal
    $animal = Animal::create($validatedData);
    \Log::info('Animal created:', $animal->toArray());

    // Step 4: Redirect
    return redirect()->route('animals.index')->with('success', 'Animal created successfully');
}


    public function edit($id)
    {
        $animal = Animal::findOrFail($id);
        return view('animals.edit', compact('animal'));
    }

    public function update(Request $request, $id)
    {
        $animal = Animal::findOrFail($id);

        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required',
                'is_featured' => 'boolean',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation failed:', $e->errors());
            return back()->withErrors($e->errors())->withInput();
        }

        if ($request->hasFile('image')) {
            if ($animal->image && $animal->image !== 'default.jpg') {
                Storage::disk('public')->delete($animal->image);
            }
            $imagePath = $request->file('image')->store('animals', 'public');
            $validatedData['image'] = $imagePath;
        }

        $animal->update($validatedData);

        return redirect()->route('animals.index')->with('success', 'Animal updated successfully');
    }

    public function destroy($id)
    {
        $animal = Animal::findOrFail($id);

        if ($animal->image && $animal->image !== 'default.jpg') {
            Storage::disk('public')->delete($animal->image);
        }

        $animal->delete();

        return redirect()->route('animals.index')->with('success', 'Animal removed successfully');
    }
}
