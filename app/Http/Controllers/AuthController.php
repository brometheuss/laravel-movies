<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignUpRequest;
use Illuminate\Http\Request;
use App\Models\UserModel;

class AuthController extends FrontEndController
{
    public function showForms(){
        return view('pages.register', $this->data);
    }

    public function login(Request $request){
        if($request->has('btnLogin')){

            $user = new UserModel();
            $email = $request->input('tbEmail');
            $pass = $request->input('tbPw');

            $user2 = $user->findUser($email, $pass);

            if($user2){
                $request->session()->put('user', $user2);
                return redirect("/")->with('msg-success', 'Uspesno ste se ulogovali.');
            } else {
                return redirect('/register')->with('msg-fail', 'Email ili lozinka pogresni.');
            }
        }
    }

    public function logout(Request $request){
        if($request->session()->has('user')) {
            $request->session()->forget('user');
            $request->flush();
        }
        return redirect('/');
    }

    public function signup(SignUpRequest $request){
        try{
            $signUpModel = new UserModel();

            $signUpModel->name = $request->input('name_register');
            $signUpModel->email = $request->input('email_register');
            $signUpModel->pass = $request->input('pass_register');
            $signUpModel->pass2 = $request->input('pass2_register');

            if($signUpModel->pass == $signUpModel->pass2){
                $signUpModel->addUser();
                return redirect()->route('home')->with('signup-success', 'You successfully registered.');
            } else {
                return redirect()->route('register')->with('pw-not-match', 'Passwords do not match');
            }

        } catch(\Throwable $e){
            \Log::info("Registracija nije uspela:", $e->getMessage());
            return redirect()->route('contact');
        }
    }
}
