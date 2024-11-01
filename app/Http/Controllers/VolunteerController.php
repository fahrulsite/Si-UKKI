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

        // Get the category IDs directly since it's already an array
        $categoryIds = $volunteer->volunteer_category_id; // No need for json_decode
        // Fetch categories by IDs
        $volunteerCategories = VolunteerCategory::whereIn('id', $categoryIds)->get();

        return view('volunteer_detail', compact('volunteer', 'recentVolunteers', 'categories', 'volunteerCategories'));
    }

    public function category($category)
{
    $categoryModel = VolunteerCategory::where('slug', $category)->firstOrFail();

    $volunteers = Volunteer::where('volunteer_category_id', 'LIKE', '%' . $categoryModel->id . '%')
        ->orderBy('created_at', 'desc')
        ->paginate(6);

    $recentVolunteers = Volunteer::orderBy('created_at', 'desc')->take(3)->get();
    $categories = VolunteerCategory::all();
    $currentCategorySlug = $category;

    return view('volunteer', compact('volunteers', 'recentVolunteers', 'category','categories', 'categoryModel', 'currentCategorySlug'));
}
    

}
