<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $table = 'province';


    /**
     * Get the district for the province.
     */
    public function districts()
    {
        return $this->hasMany(District::class, '_province_id');
    }

    public function wards()
    {
        return $this->hasMany(Ward::class, '_province_id');
    }

    public function streets()
    {
        return $this->hasMany(Street::class, '_province_id');
    }
}
