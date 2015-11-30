<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ApiController extends Controller {

    public function checkEmailExists(Request $request) {

        //$email = Input::get('email');
        $email = $request->get('email');

        \Debugbar::info("Comprovant email " . $email);

        //TODO comprovar email correctament.
        if($this.$this->checkEmail($email)) {
            return "true";
        } else {
            return "false";
        }

        //return "Comprovant email" . $email;
    }

    private function checkEmail($email)
    {
        $user =  User::where('email',$email)->first();

        if ($user == null) {
            return true;
        } else {
            return false;
        }
    }
}
