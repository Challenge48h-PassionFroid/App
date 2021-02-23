<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;

class ImageController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function displayAddImage()
    {
        $token = session('jwt');

        // Utilisateur connecté ?
        if (is_null($token)) {
            return redirect('/connexion');
        }
        
        return view('addImage');
    }

    public function displaySearchImage(Request $request)
    {
        $token = session('jwt');

        // Utilisateur connecté ?
        if (is_null($token)) {
            return redirect('/connexion');
        }

        $images = Http::withToken($token)->get('https://chall48h-passionfroid.herokuapp.com/images')->throw()->json();

        return view('searchImage', [
            'images' => $images
        ]);
    }
}
