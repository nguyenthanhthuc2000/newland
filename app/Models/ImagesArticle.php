<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagesArticle extends Model
{
    use HasFactory;

    protected $table = 'images_article';
    protected $guarded = [];
    public $timestamps = true;
}
