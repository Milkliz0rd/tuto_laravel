@extends('base')

@section("title", "Mon Blog")

@section('content')
  <div class="flex flex-col gap-4 justify-center items-center">
  <h1 class="font-semibold text-3xl ">Mon blog</h1>
  <p>Bienvenue sur mon blog !</p>

  @foreach($posts as $post)
    <article class="bg-white p-4 rounded shadow-md w-full max-w-2xl text-center">
      <h2>{{ $post->title }}</h2>
      <p>{{ $post->content }}</p>
      <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mt-2">
      <a href="{{ route('blog.show', ['slug' => $post->slug, 'post' => $post->id]) }}">Lire la suite</a>
      </button>
    </article>
  @endforeach
  {{ $posts->links() }}
  </div>
@endsection