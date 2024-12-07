<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Service;

class HomeController extends Controller
{
    public function index(){
        $featuredAnimals = Animal::where('is_featured', true)
            ->limit(4)
            ->get();

        $featuredServices = Service::where('is_featured', true)
            ->limit(3)
            ->get();
        
        return view('home.index', [
            'featuredAnimals' => $featuredAnimals,
            'featuredServices' => $featuredServices,
        ]);
    }

    public function about(){
        // Fetch about page content from database or config
        $zooHistory = config('zoo.history', 'Wild Time Zoo has been a leader in animal conservation since 1985.');
        $mission = config('zoo.mission', 'Our mission is to educate and inspire conservation efforts.');
        
        return view('home.about', [
            'zooHistory' => $zooHistory,
            'mission' => $mission
        ]);
    }

    /**
     * Display the zoo's mission and values
     */
    public function mission()
    {
        $values = [
            'Conservation' => 'Protecting endangered species and their habitats.',
            'Education' => 'Providing meaningful learning experiences about wildlife.',
            'Research' => 'Supporting scientific research and animal welfare.',
            'Community' => 'Engaging with local and global conservation efforts.'
        ];

        return view('home.mission', [
            'values' => $values
        ]);
    }
}
