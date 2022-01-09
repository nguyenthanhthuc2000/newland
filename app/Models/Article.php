<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $table = 'article';
    protected $guarded = [];
    public $timestamps = true;

    public function images_article(){
        return $this->hasMany(ImagesArticle::class);
    }
}
