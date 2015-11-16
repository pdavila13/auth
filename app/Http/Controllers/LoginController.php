<?php

namespace App\Http\Controllers;

use App\User;
use Hash;
use Illuminate\Http\Request;
use App\Http\Requests;

/**
 * Class LoginController
 * @package App\Http\Controllers
 */
class LoginController extends Controller {

    /**
     * Process a login HTTP POST
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function postLogin(Request $request) {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($this->login($request->email,$request->password)){
            //REDIRECT TO HOME
            return redirect()->route('auth.home');
        } else {
            $request->session()->flash('login_error', 'Login incorrecte!');

            //REDIRECT BACK
            return redirect()->route('auth.login');
        }
    }

    /**
     * @param $email
     * @param $password
     * @return bool
     */
    private function login($email, $password){
        //TODO: Mirar bé a la base de dades

        //$user = User::findOrFail(id);
        //$user = User::all();
        $user = User::where('email', $email)->first();

        //return $user->password == bcrypt($password) ? true : false;
        return Hash::check($password, $user->password) ? true : false;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function getLogin(){
        return view('login');
    }
}
