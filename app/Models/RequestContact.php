<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestContact extends Model
{
    use HasFactory;
    protected $table = 'request_contact';
    protected $guarded = [];
    public $timestamps = true;
    protected $perPage = 8;
}
