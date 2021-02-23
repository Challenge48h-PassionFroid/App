<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function displayAddImage()
    {
        $value = session('jwt');
        
        // Utilisateur connecté ?
        if (is_null($value)) {
            return redirect('/connexion');
        }
        
        return view('addImage');
    }

    public function displaySearchImage()
    {
        $value = session('jwt');

        // Utilisateur connecté ?
        if (is_null($value)) {
            return redirect('/connexion');
        }

        return view('searchImage');
    }
}
