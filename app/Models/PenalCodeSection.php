<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PenalCodeSection extends Model
{
    use HasFactory, SoftDeletes;

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
        return $this->hasMany(PenalCodeAmendment::class, 'section_id');
    }

    public function userNotes()
    {
        return $this->hasMany(UserNote::class, 'section_id');
    }

    public function starredBy()
    {
        return $this->hasMany(StarredSection::class, 'section_id');
    }

    public function likedBy()
    {
        return $this->hasMany(LikedSection::class, 'section_id');
    }

    public function getUserNoteAttribute()
    {
        return $this->userNotes()->where('user_id', auth()->id())->first()?->note;
    }

    public function getIsStarredAttribute()
    {
        return $this->starredBy()->where('user_id', auth()->id())->exists();
    }

    public function getIsLikedAttribute()
    {
        return $this->likedBy()->where('user_id', auth()->id())->exists();
    }
}
