<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginaUtilizatorController extends Controller
{
    public function index()
    {
        return view('pagina_utilizator'); // Asigurați-vă că aveți o vedere corespunzătoare (pagina_goal.blade.php)
    }
}
