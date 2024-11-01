<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('user')->orderBy('created_at', 'desc')->paginate(6);
        $categories = EventCategory::all();
        return view('event', compact('events', 'categories'));
    }

    public function show($slug)
{
    $event = Event::with('user')->where('slug', $slug)->firstOrFail();
    $recentEvents = Event::orderBy('created_at', 'desc')->take(3)->get();
    $categories = EventCategory::all();

    // Get the category IDs directly since it's already an array
    $categoryIds = $event->event_category_id; // No need for json_decode

    // Fetch categories by IDs
    $eventCategories = EventCategory::whereIn('id', $categoryIds)->get();

    return view('event_detail', compact('event', 'recentEvents', 'categories', 'eventCategories'));
}




    public function category($category)
    {
        // Fetch posts that belong to the selected category
        $categoryModel = EventCategory::where('slug', $category)->firstOrFail();

        $events = Event::where('event_category_id', 'LIKE', '%' . $categoryModel->id . '%')
        ->orderBy('created_at', 'desc')
        ->paginate(6);

        // Also fetch recent posts if you want to show them on the sidebar
        $recentEvents = Event::orderBy('created_at', 'desc')->take(3)->get();
        $categories = EventCategory::all();
        $currentCategorySlug = $category;

        // Pass data to the blog view
        return view('event', compact('events', 'recentEvents', 'category', 'categoryModel', 'categories', 'currentCategorySlug'));
    }
}
