<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PoliceDivision extends Model
{
    protected $fillable = ['province_id', 'name', 'slug'];

    public function province(): BelongsTo
    {
        return $this->belongsTo(PoliceProvince::class, 'province_id');
    }

    public function stations(): HasMany
    {
        return $this->hasMany(PoliceStation::class, 'division_id');
    }
}
