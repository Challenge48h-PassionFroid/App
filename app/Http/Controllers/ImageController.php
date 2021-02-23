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

        // On récupère les paramètres de la recherche pour construire notre requête
        // A FACTORISER (manque de temps)
        $request = 'https://chall48h-passionfroid.herokuapp.com/images?';

        if (isset($_GET['name'])) {
            $request = $request . "name_contains=" . $_GET['name'] . "&";
        }

        if (isset($_GET['type']) && $_GET['type'] != "none") {
            $request = $request . "type_contains=" . $_GET['type'] . "&";
        }

        if (isset($_GET['credits']) && is_null($_GET['credits'])) {
            $request = $request . "credits_contains=" . $_GET['credits'] . "&";
        }

        if (isset($_GET['withProduct'])) {
            $request = $request . "hasAProduct=true&";
        }

        if (isset($_GET['withHuman'])) {
            $request = $request . "hasAHuman=true&=";
        }

        if (isset($_GET['isVertical'])) {
            $request = $request . "imageFormat=vertical&";
        }

        if (isset($_GET['isInstitutional'])) {
            $request = $request . "isInstitutional=true&";
        }

        if (isset($_GET['tags'])) {
            $tags = explode(',', $_GET['tags']);
            $request = $request . "_where";

            foreach ($tags as &$tag) {
                $tag = trim($tag);
                $request = $request . "[tags_contains]=" . $tag . "&";
            }
        }

        $images = Http::withToken($token)->get($request)->throw()->json();

        return view('searchImage', [
            'images' => $images
        ]);
    }
}
