<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function displayLogin()
    {
        $token = session('jwt');
        // Utilisateur connecté ?
        if (is_null($token)) {
            return view('login');
        }

        return redirect('/');
    }

    public function loginToStrapi(Request $request)
    {
        $response = Http::post('https://chall48h-passionfroid.herokuapp.com/auth/local', [
            'identifier' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        if ($response->status() == 200) {
            // Stock Token JWT dans la session
            session(['jwt' => $response->throw()->json()['jwt']]);
            return redirect('/');
        }

        return redirect('/connexion')->withErrors(['credentials' => 'Identifiant et/ou mot de passe incorrect.']);
    }

    public function logout()
    {
        session(['jwt' => null]);
        return redirect('/connexion');
    }
}
