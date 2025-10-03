<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        schema::create('post_tag', function (Blueprint $table) {
            
            $table->foreignIdFor(\App\Models\Post::class)->constrained()->cascadeOnDelete(); // On crée une clé étrangère vers la table posts, avec la contrainte de suppression en cascade
            $table->foreignIdFor(\App\Models\Tag::class)->constrained()->cascadeOnDelete(); // On crée une clé étrangère vers la table tags, avec la contrainte de suppression en cascade
            $table->primary(['post_id', 'tag_id']); // Clé primaire composée pour éviter les doublons
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_tag');
        Schema::dropIfExists('tags');
    }
};
