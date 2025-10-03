<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormPostRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\View\View;


class BlogController extends Controller
{
    // Liste des articles (page d'accueil du blog)
    public function index(): View
    {
        // $post = Post::find(2);
        // $post->tags()->createMany([
        //     ['name' => 'Tag1'],
        //     ['name' => 'Tag2'],
        //     ['name' => 'Tag3'],
        // ]);

        return view('blog.index', [
            'posts' => Post::oldest()->paginate(3) //paginate(6) permet de paginer les résultats par 6
        ]);
    }

    // Formulaire de création d'un nouvel article
    public function create(): View
    {
        $post = new Post();
        return view('blog.create', [
            'post' => $post
        ]);
    }
    // Enregistrement d'un nouvel article
    public function store(FormPostRequest $request)
    {
        // Creation de l'article
        $post = Post::create($request->validated()); //validated() permet de récupérer les données validées par le form request(createPostRequest)
        return redirect()->route('blog.show', ['slug' => $post->slug, 'post' => $post->id])->with('success', 'l\'article a bien été sauvegardé !');// Redirection vers la page de l'article créé en passant le slug et l'id de l'article avec un message de succès
    }
    
    // Formulaire d'edit d'un article
    public function edit(Post $post): View
    {
        return view('blog.edit', [
            'post' => $post
        ]);
    }
    // Mise à jour d'un article
    public function update(FormPostRequest $request, Post $post)
    {
        $post->update($request->validated());
        return redirect()->route('blog.show', ['slug' => $post->slug, 'post' => $post->id])->with('success', 'l\'article a bien été mis à jour !');// Redirection vers la page de l'article créé en passant le slug et l'id de l'article avec un message de succès
    }


    // Page d'article selectionné
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
