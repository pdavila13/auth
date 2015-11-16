<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;

class RegisterController extends Controller {
    //

    public function postRegister(Request $request) {

        $this->validate($request, [
           'name' => 'required|max:100',
           'email' => 'required|email|unique:users,email',
           'password' => 'required|confirmed'
        ]);

        $user = new User();
        $user->name = $request->get('name');
        $user->password = bcrypt($request->get('password'));
        $user->email = $request->get('email');
        $user->save();

        return redirect()->route('auth.login');
    }

    /*
    public function postRegister()
    {
        $user = new User();

        $user->name = Input::get('name');
        $user->password = bcrypt(Input::get('password'));
        $user->email = Input::get('email');

        $user->save();
    }
    */


    public function getRegister() {
        //echo "Aquí va el registre";
        return view('register');
    }


}
