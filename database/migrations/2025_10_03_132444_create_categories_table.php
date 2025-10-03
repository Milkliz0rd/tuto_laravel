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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->foreignIdFor(App\Models\Category::class)->nullable()->constrained()->cascadeOnDelete() ;
        }); // Ajoute une clé étrangère category_id à la table posts qui référence l'id de la table categories. nullable permet de rendre la clé étrangère optionnelle. constrained crée la contrainte de clé étrangère. cascadeOnDelete supprime les articles liés si la catégorie est supprimée.
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
        Schema::table('posts', function (Blueprint $table){
            $table->dropForeignIdFor(App\Models\Category::class); // Supprime la clé étrangère category_id de la table posts
        });
    }
};
