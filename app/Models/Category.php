<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name']; // Autorise l'attribut name à être assigné en masse

    public function posts() {
        return $this->hasMany(Post::class);
    } // Une catégorie peut avoir plusieurs articles
}
