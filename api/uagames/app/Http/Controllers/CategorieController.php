<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    use HasFactory;

    public function index()
    {
        return view('categories.categories');
        
    }
}