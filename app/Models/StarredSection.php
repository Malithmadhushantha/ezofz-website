<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StarredSection extends Model
{
    protected $fillable = ['user_id', 'section_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function section()
    {
        return $this->belongsTo(PenalCodeSection::class);
    }
}
