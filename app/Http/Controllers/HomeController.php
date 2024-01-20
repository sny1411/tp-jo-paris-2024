<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function accueil()
    {
        return view('accueil', ['titre' => 'Accueil', 'message'=>"le ". date("d/m/y")]);
    }

    public function contact()
    {
        return view('contact', ['titre' => 'Contact']);
    }

    public function apropos()
    {
        return view('apropos', ['titre' => 'A propos']);
    }
}
