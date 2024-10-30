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
        return view('event_detail', compact('event', 'recentEvents', 'categories'));
    }

    public function category($category)
    {
        // Fetch posts that belong to the selected category
        $events   = Event::whereHas('eventCategory', function ($query) use ($category) {
        $query->where('slug', $category);
        })->orderBy('created_at', 'desc')->paginate(6);


        $categories = EventCategory::all();

        // Also fetch recent posts if you want to show them on the sidebar
        $recentEvents = Event::orderBy('created_at', 'desc')->take(3)->get();
        $categories = EventCategory::all();
        $currentCategorySlug = $category;
        // Pass data to the blog view
        return view('event', compact('events', 'recentEvents', 'category', 'categories', 'currentCategorySlug'));
    }
}
