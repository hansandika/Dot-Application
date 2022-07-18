<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'post_category_id', 'title', 'description', 'image_url'];

    /**
     * Get the user based on post
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get post category 
     */
    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id', 'id');
    }

    /**
     * Get image attribute (Mutator)
     */
    public function getImageAttribute()
    {
        return '/storage/posts/' . $this->image_url;
    }
}
