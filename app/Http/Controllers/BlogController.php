<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->orderBy('created_at', 'desc')->paginate(6);
        return view('blog', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::with('user')->where('slug', $slug)->firstOrFail();
        $recentPosts = Post::orderBy('created_at', 'desc')->take(3)->get();
        $categories = Category::all();
        return view('blog_detail', compact('post', 'recentPosts', 'categories'));
        
    }

    public function category($category)
    {
        // Fetch posts that belong to the selected category
        $categoryModel = Category::where('slug', $category)->firstOrFail();
        
        $posts = Post::where('category_id', 'LIKE', '%' . $categoryModel->id . '%')
        ->orderBy('created_at', 'desc')
        ->paginate(6);


        // Also fetch recent posts if you want to show them on the sidebar
        $recentPosts = Post::orderBy('created_at', 'desc')->take(3)->get();
        // Pass data to the blog view
        return view('blog', compact('posts', 'recentPosts', 'category', 'categoryModel'));
    }


    
}
