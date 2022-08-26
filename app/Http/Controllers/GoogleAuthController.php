<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class GoogleAuthController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle(){
        try{

            $google_user = Socialite::driver('google')->user();
            $user = User::where('email', $google_user->getEmail())->first();

            if(!$user){

                $new_user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId()
                ]);
                Auth::login($new_user);

                return redirect()->intended('/');
            }

            else{
                Auth::login($user);

                return redirect()->intended('/');
            }

        }catch(\Throwable $th){
            dd('Ocorreu algum problema! '. $th->getMessage());
        }


    }
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
     
    public function InfoHome(){
        $teste = Auth::user();
        if($teste != null){
            $UserLogado = ([
                'name' => Auth::user()->name,
                'email' => Auth::user()->email
            ]);
        }else{
            $UserLogado = ([
                'name' => null,
                'email' => null
            ]);
        }
        return view('home', compact('UserLogado'));
    }

}
