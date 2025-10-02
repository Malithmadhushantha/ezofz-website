<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriminalProcedureCodeAmendment extends Model
{
    use HasFactory;

    protected $fillable = [
        'criminal_procedure_code_id',
        'amendment_number',
        'amendment_date',
        'amendment_content',
        'illustrations_1',
        'illustrations_2',
        'illustrations_3',
        'explanation_1',
        'explanation_2',
        'explanation_3',
    ];

    protected $casts = [
        'amendment_date' => 'date',
    ];

    public function section()
    {
        return $this->belongsTo(CriminalProcedureCode::class);
    }
}
