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

}

