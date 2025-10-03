<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <title> @yield('title') </title>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col p-[0px_50px]">
  
<div class="bg-blue-500 w-full border border-black p-4 mb-4">
  <nav class="flex gap-4 text-white font-medium list-none">
    <li>
      <a @class(["font-extrabold text-xl" => (request()->route()->getName()==='blog.index')])  href="{{ route('blog.index') }}">Blog</a>
    </li>
    <li><a @class(["font-extrabold text-xl" => (request()->route()->getName()==='blog.create')])  href="{{ route('blog.create') }}">Créer un article</a></li>
    <li><a href="#">Contact</a></li>
    <li><a href="#">A propos</a></li>
  </nav>
</div>

  <div class="container mx-auto p-4 flex flex-col gap-4">
    @if (session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Succès!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
      </div>
    @endif
    
    @yield('content')
  </div>

</body>
</html>