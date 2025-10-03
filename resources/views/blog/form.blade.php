<form action="" method="POST" class="flex flex-col gap-4 border p-10 rounded box-shadow shadow-lg">
  @csrf {{-- token CSRF pour sécuriser le formulaire, sinon un middleware de Laravel bloque la requête --}}
  @method($post->id ? 'PATCH' : 'POST') {{-- méthode HTTP pour la mise à jour (PATCH) ou la création (POST) --}}
  {{-- Si l'article a un id, c'est qu'il existe déjà, donc on utilise la méthode PATCH pour la mise à jour. Sinon, on utilise la méthode POST pour la création. --}}
  <div>
  <input type="text" name="title" placeholder="Titre" value="{{ old('title'), 'mon titre' }}"class="border-2 border-gray-200" />
    @error('title')
      <div class="text-red-500">{{ $message }}</div>
    @enderror
  </div>
  <div>
  <input type="text" name="slug" placeholder="Slug" value="{{ old('slug'), 'mon slug' }}"class="border-2 border-gray-200" />
    @error('slug')
      <div class="text-red-500">{{ $message }}</div>
    @enderror
  </div>
  <div>
  <textarea class="border-2 border-gray-200 " name="content" >{{old('content', "Contenu de démonstration")}}</textarea>
    @error('content')
      <div class="text-red-500">{{ $message }}</div>
    @enderror
  </div>
  <button class="border p-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition w-" type="submit">
    @if ($post->id)
      Modifier l'article
    @else
      Créer l'article
    @endif
  </button>

</form>