@extends('base')

@section('title', $post->title)

@section('content')
  <div class="flex flex-col gap-4 justify-center items-center">
    <article class="bg-white p-4 rounded shadow-md w-full max-w-2xl text-center flex flex-col gap-4">
      <h1 class="text-5xl font-extrabold" >{{ $post->title }}</h1>
      <p>{{ $post->content }}</p>
    </article>
  </div>
@endsection