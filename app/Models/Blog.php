<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $fillable = ['title', 'name', 'category', 'description', 'content', 'image', 'blog_category_id'];

    // One blog belongs to one category
    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
