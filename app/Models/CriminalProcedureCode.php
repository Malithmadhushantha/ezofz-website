<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriminalProcedureCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'chapter_name',
        'sub_chapter_name',
        'section_number',
        'sub_section_number',
        'name_of_the_section',
        'section_content',
        'illustrations_1',
        'illustrations_2',
        'illustrations_3',
        'explanation_1',
        'explanation_2',
        'explanation_3',
    ];

    public function amendments()
    {
        return $this->hasMany(CriminalProcedureCodeAmendment::class);
    }

    public function notes()
    {
        return $this->hasMany(CriminalProcedureCodeNote::class, 'criminal_procedure_codes_section_id');
    }

    public function starredBy()
    {
        return $this->hasMany(CriminalProcedureCodeStarredSection::class, 'criminal_procedure_codes_section_id');
    }

    public function likedBy()
    {
        return $this->hasMany(CriminalProcedureCodeLikedSection::class, 'criminal_procedure_codes_section_id');
    }
}
