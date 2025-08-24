<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function dashboard()
    {
        $documents = Document::latest()->paginate(10);
        return view('admin.dashboard', compact('documents'));
    }

    public function documents()
    {
        $documents = Document::latest()->paginate(10);
        return view('admin.documents', compact('documents'));
    }
}
