<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CriminalProcedureCodeNote extends Model
{
    protected $table = 'criminal_procedure_code_notes';
    protected $fillable = ['user_id', 'criminal_procedure_codes_section_id', 'note'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function section()
    {
        return $this->belongsTo(CriminalProcedureCode::class, 'criminal_procedure_codes_section_id');
    }
}
