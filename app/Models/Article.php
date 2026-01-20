<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;


    protected $primaryKey = 'article_id'; 


    protected $fillable = [
        'author_id',
        'title',
        'cover_image',
        'category',
        'content',
        'status',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id', 'author_id');
    }

}