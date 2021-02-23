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

    public function displayLogin(Request $request)
    {
        $value = session('jwt');
        // Utilisateur connecté ?
        if (is_null($value)) {
            return view('login');
        }
        
        return redirect('/');
    }

    /**
   * login to strapi
   *
   * @param  string  $email
   * @param  string  $password
   */
    public function loginToStrapi($email, $password)
    {
        $response = Http::get('https://chall48h-passionfroid.herokuapp.com/auth/local', [
            'identifier' => $email,
            'password' => $password,
          ]);
      
          dump($response);
          return redirect('/login');
    }
}
