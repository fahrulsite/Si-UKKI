<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use App\Models\VolunteerCategory;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public function index()
    {
        $volunteers = Volunteer::with('user')->orderBy('created_at', 'desc')->paginate(6);
        $categories = VolunteerCategory::all();

        return view('volunteer', compact('volunteers', 'categories'));
    }

    public function show($slug)
    {
        $volunteer = Volunteer::with('user')->where('slug', $slug)->firstOrFail();
        $recentVolunteers = Volunteer::orderBy('created_at', 'desc')->take(3)->get();
        $categories = VolunteerCategory::all();
        return view('volunteer_detail', compact('volunteer', 'recentVolunteers', 'categories'));
    }

    public function category($category)
{
    $volunteers = Volunteer::whereHas('volunteerCategory', function ($query) use ($category) {
        $query->where('slug', $category);
    })->orderBy('created_at', 'desc')->paginate(6);

    $recentVolunteers = Volunteer::orderBy('created_at', 'desc')->take(3)->get();
    $categories = VolunteerCategory::all();
    $currentCategorySlug = $category; // Set the current category slug

    return view('volunteer', compact('volunteers', 'recentVolunteers', 'categories', 'currentCategorySlug'));
}
    

}
