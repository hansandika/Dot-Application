<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Get lists of post based on category
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
