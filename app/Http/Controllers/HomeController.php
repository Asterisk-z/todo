<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $tasks = Todo::where('isPublic', 'yes')
                    ->orderBy('created_at', 'ASC')
                    ->get();
        return view('home', compact('tasks'));
    }
}
