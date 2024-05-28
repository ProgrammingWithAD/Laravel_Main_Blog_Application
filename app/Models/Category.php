<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = ['category'];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_category_mapings', 'category_id', 'blog_id');
    }

}
