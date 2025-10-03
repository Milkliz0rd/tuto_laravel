<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'content'];

    public function category () {
    return $this->belongsTo(Category::class); // Un article appartient à une catégorie 
    }

    public function tags () {
    return $this->belongsToMany(Tag::class); // Un article peut avoir plusieurs tags
    }
}

