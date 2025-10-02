<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Document extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'description',
        'file_path',
        'pdf_file_path',
        'word_file_path',
        'excel_file_path',
        'pdf_file_size',
        'word_file_size',
        'excel_file_size',
        'category_id',
        'subcategory_id',
    ];

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(\App\Models\Subcategory::class);
    }

    // Helper methods for file management
    public function hasPdfFile()
    {
        return !empty($this->pdf_file_path) && Storage::disk('public')->exists($this->pdf_file_path);
    }

    public function hasWordFile()
    {
        return !empty($this->word_file_path) && Storage::disk('public')->exists($this->word_file_path);
    }

    public function hasExcelFile()
    {
        return !empty($this->excel_file_path) && Storage::disk('public')->exists($this->excel_file_path);
    }

    public function getPdfFileSizeFormatted()
    {
        return $this->pdf_file_size ? round($this->pdf_file_size / 1024, 2) . ' KB' : 'N/A';
    }

    public function getWordFileSizeFormatted()
    {
        return $this->word_file_size ? round($this->word_file_size / 1024, 2) . ' KB' : 'N/A';
    }

    public function getExcelFileSizeFormatted()
    {
        return $this->excel_file_size ? round($this->excel_file_size / 1024, 2) . ' KB' : 'N/A';
    }

    public function getAvailableFileTypes()
    {
        $types = [];
        if ($this->hasPdfFile()) $types[] = 'PDF';
        if ($this->hasWordFile()) $types[] = 'Word';
        if ($this->hasExcelFile()) $types[] = 'Excel';
        return $types;
    }
}
