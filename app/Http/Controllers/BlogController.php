<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogFilterRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(): View
    {
        return view('blog.index', [
            'posts' => Post::paginate(1)
        ]);
    }

    public function show( string $slug, Post $post): RedirectResponse | view
    {
        
    if ($post->slug !== $slug) {
        return to_route('blog.show', ['slug' => $post->slug, 'post' => $post->id]);
    }
    return view('blog.show', [
        'post' => $post
    ]);
    }
    
};
