<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $guarded = [];
    public $timestamps = true;
    protected $perPage = 10;
}
