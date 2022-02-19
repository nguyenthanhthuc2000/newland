<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectDistrict extends Model
{
    use HasFactory;

    protected $table = 'project_district';
    protected $guarded = [];
    public $timestamps = true;
    protected $perPage = 15;
}
