<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public $timestamps = true;
    protected $perPage = 8;

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function districts()
    {
        return $this->hasMany(District::class, '_province_id', 'province_id');
    }

    public function wards()
    {
        return $this->hasMany(Ward::class, '_district_id', 'district_id');
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function district(){
        return $this->hasOne(District::class, 'id', 'district_id');
    }

    public function province(){
        return $this->hasOne(Province::class, 'id', 'province_id');
    }

    public function ward(){
        return $this->hasOne(Ward::class, 'id', 'ward_id');
    }
}
