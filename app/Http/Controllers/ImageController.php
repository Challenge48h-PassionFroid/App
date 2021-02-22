<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function displayAjout()
    {
        return view('ajoutImage');
    }
    public function displayRecherche()
    {
        return view('recherche');
    }
}
