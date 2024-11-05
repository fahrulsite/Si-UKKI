<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        // Fetch all profiles with specific fields
        $profils = Profil::select('title', 'slug')->where('status', true)->get();
        return view('components.navbar', compact('profils'));
    }

    public function show($slug)
    {
        // Find profile by slug
        $profil = Profil::where('slug', $slug)->firstOrFail();
        return view('profil_detail', compact('profil'));
    }
}
