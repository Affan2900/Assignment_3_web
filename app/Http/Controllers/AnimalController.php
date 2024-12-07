<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class AnimalController extends Controller
{
    public function index(){
        //Retrieve and display information
        $animals = Animals::where('is_featured', true)->get();
        return view('animals.index', compact('animals'));
    }

    //Admin CRUD methods
    public function adminIndex(){
        $animals = Animal::all();
        return view('animals.admin.index', compact('animals'));
    }

    public function create(){
        return view('admin.animals.create');
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'is_featured' => 'boolean',
        ]);

        Animal::create($validateData);
        return redirect()->route('admin.animals.index')->with('success', 'Animal created successfully');
    }

    public function edit($id){
        $animal = Animal::findOrFail($id);
        return view('admin.animals.edit', compact('animal'));
    }

    public function update(Request $request, $id){
        $animal = Animal::findOrFail($id);
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'is_featured' => 'boolean',
        ]);

        $animal->update($validateData);
        return redirect()->route('admin.animals.index')->with('success', 'Animal updated successfully');
    }

    public function destroy($id)
    {
        $animal = Animal::findOrFail($id);
        $animal->delete();
        return redirect()->route('admin.animals.index')->with('success', 'Animal removed successfully');
    }
}
