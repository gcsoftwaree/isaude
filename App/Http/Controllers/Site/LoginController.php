<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return view('/');
        }
        return view('site.login.index');
    }

    public function forgot()
    {
        return view('site.login.forgot');
    }

    public function authenticate(LoginFormRequest $request)
    {
        $credentials = [
            'DS_LOGIN' => $request->DS_LOGIN,
            'password' => $request->DS_SENHA
        ];
        $masterList = User::where('ST_USUARIO', 'A')->where('DS_LOGIN', $request->DS_LOGIN)->first();
        if (Auth::attempt($credentials)) {
            if ($masterList) {
                toastr()->success('Login Realizado');
                return redirect()->intended('home');
            }

            return Redirect::back()->withErrors('Usuário Inativo');
        }

        return back()->withErrors([
            'DS_LOGIN' => ['Login ou senha inválidos.']
        ]);

    }

    public function logout(request $request)
    {
        Auth::logout();

        return redirect()->intended('/');
    }
}
