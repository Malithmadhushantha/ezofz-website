<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
