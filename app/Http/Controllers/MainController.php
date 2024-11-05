<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Post;
use App\Models\Testimoni;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        $events = Event::orderBy('created_at', 'desc')->take(3)->get();
        $testimonies = Testimoni::all();
        return view('welcome', compact( 'posts', 'events', 'testimonies'));
    }
}
