<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller {
    public function postLogin(Request $request){
        dd($request->all());
        //dd(Input::all());
        //\Debugbar::info("Entra a postLogin");
        echo "jajaja";

        if($this->login($request->email,$request->password)){
            //REDIRECT TO HOME
            return redirect()->route('auth.home');
        } else {
            //REDIRECT BACK
            return redirect()->route('auth.login');
        }
    }

    public function getLogin(){
        return view('login');
    }

    private function login($email, $password){
        //TODO: Mirar bé a la base de dades
        return true;
    }
}
