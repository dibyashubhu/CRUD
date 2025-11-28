<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    //
    protected $fillable = ['name']; // Category name

    // One category has many blogs
    public function blogs()
    {
        return $this->hasMany(Blog::class, 'blog_category_id');
    }
}
