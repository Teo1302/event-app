<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginaGoalController extends Controller
{
    public function index()
    {
        return view('pagina_goala'); // Asigurați-vă că aveți o vedere corespunzătoare (pagina_goal.blade.php)
    }
}
