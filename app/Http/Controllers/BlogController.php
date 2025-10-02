<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogFilterRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\Post;
use Illuminate\Contracts\View\View;

class BlogController extends Controller
{
    public function index(BlogFilterRequest $request): View
    {
        // dd($request->validated());
        return view('blog.index', [
            'posts' => Post::paginate(1)
        ]);
    }

    public function show(string $slug, string $id): RedirectResponse | view
    {
            $post = \App\Models\Post::findOrFail($id);
    if ($post->slug !== $slug) {
        return to_route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);
    }
    return view('blog.show', [
        'post' => $post
    ]);
    }
    
}
