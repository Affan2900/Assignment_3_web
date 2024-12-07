<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of services
     */
    public function index()
{
    $services = Service::where('is_active', true)->paginate(9);

    return view('services.index', [
        'services' => $services
    ]);
}

    /**
     * Display detailed information about a specific service
     */
    public function show($id)
    {
        $service = Service::findOrFail($id);

        return view('services.show', [
            'service' => $service
        ]);
    }

    /**
     * Admin method to create a new service
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created service
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'is_featured' => 'boolean',
            'is_active' => 'boolean'
        ], [
            'name.required' => 'Service name is required',
            'description.required' => 'Service description is required',
            'price.numeric' => 'Price must be a number',
            'price.min' => 'Price cannot be negative'
        ]);

        $service = Service::create($validatedData);

        return redirect()->route('services.index')
            ->with('success', 'Service created successfully');
    }

    /**
     * Edit an existing service
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);

        return view('admin.services.edit', [
            'service' => $service
        ]);
    }

    /**
     * Update an existing service
     */
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'is_featured' => 'boolean',
            'is_active' => 'boolean'
        ], [
            'name.required' => 'Service name is required',
            'description.required' => 'Service description is required',
            'price.numeric' => 'Price must be a number',
            'price.min' => 'Price cannot be negative'
        ]);

        $service->update($validatedData);

        return redirect()->route('services.index')
            ->with('success', 'Service updated successfully');
    }

    /**
     * Remove a service
     */
    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('services.index')
            ->with('success', 'Service removed successfully');
    }
}
