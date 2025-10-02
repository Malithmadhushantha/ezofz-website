<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PoliceStation extends Model
{
    protected $fillable = [
        'division_id',
        'name',
        'slug',
        'oic_mobile',
        'office_phone',
        'email',
        'address',
        'latitude',
        'longitude'
    ];

    public function division(): BelongsTo
    {
        return $this->belongsTo(PoliceDivision::class, 'division_id');
    }

    public function province()
    {
        return $this->division->province();
    }
}
