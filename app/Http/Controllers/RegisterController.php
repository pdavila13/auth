<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input;
use Mail;
use stdClass;

class RegisterController extends Controller {
    //

    protected $email;
    protected $name;

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

        $this->email = $request->get('email');
        $this->name = $request->get('name');

        $this->sendRegisterEmail();

        return redirect()->route('auth.login');
    }

    public function sendRegisterEmail() {

        //Objecte que va emmagatzemant l'informació
        $emailData = new \stdClass();

        $emailData->email = $this->email;
        $emailData->name = $this->name;
        $emailData->subject = "Benvingut usuari " . $this->name;

        //$data['text'] = "Hola!";
        $data['name'] = $this->name;

        \Mail::send('emails.message', $data, function ($message) use ($emailData) {
            $message->from(env('CONTACT_MAIL'), env('CONTACT_NAME'));
            $message->to($emailData->email, $emailData->name);
            $message->subject($emailData->subject);
        });
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
