<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CriminalProcedureCodeStarredSection extends Model
{
    protected $table = 'criminal_procedure_code_starred_sections';
    protected $fillable = ['user_id', 'criminal_procedure_codes_section_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function section()
    {
        return $this->belongsTo(CriminalProcedureCode::class, 'criminal_procedure_codes_section_id');
    }
}
