<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectProvince extends Model
{
    use HasFactory;

    protected $table = 'project_province';
    protected $guarded = [];
    public $timestamps = true;
    protected $perPage = 15;
}
