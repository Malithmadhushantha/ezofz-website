<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PoliceProvince extends Model
{
    protected $fillable = ['name', 'slug'];

    public function divisions(): HasMany
    {
        return $this->hasMany(PoliceDivision::class, 'province_id');
    }

    public function stations()
    {
        return $this->hasManyThrough(PoliceStation::class, PoliceDivision::class, 'province_id', 'division_id');
    }
}
