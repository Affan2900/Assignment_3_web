<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;

class HomeController extends Controller
{
    public function index(){
        $featuredAnimals = Animal::where('is_featured', true)
            ->limit(4)
            ->get();

        
        return view('home.index', [
            'featuredAnimals' => $featuredAnimals
        ]);
    }

    public function about(){
        // Fetch about page content from database or config
        $zooHistory = config('zoo.history', 'Wild Time Zoo has been a leader in animal conservation since 1985.');
        $mission = config('zoo.mission', 'Our mission is to educate and inspire conservation efforts.');
        
        return view('about', [
            'zooHistory' => $zooHistory,
            'mission' => $mission
        ]);
    }

    
}
