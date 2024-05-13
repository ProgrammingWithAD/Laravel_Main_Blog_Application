<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['blog_title', 'url', 'blog_content', 'blog_status', 'blog_category', 'blog_thumbnail', 'user_id'];
}


// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Blog extends Model
// {
//     use HasFactory;

//     protected $table = 'blogs';
//     protected $fillable = ['blog_title', 'url', 'blog_content', 'blog_status', 'blog_category', 'blog_thumbnail', 'user_id'];
// }
