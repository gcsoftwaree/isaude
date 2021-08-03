<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Models\User;
use App\Models\UserMail;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    protected $redirectTo = RouteServiceProvider::HOME;

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

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $providerUser = Socialite::driver($provider)->user();
        $user = User::firstOrCreate(['DS_LOGIN' => $providerUser->getEmail()],[
            'DS_LOGIN' => $providerUser->getName() ?? $providerUser->getEmail(),
            'ID_PROVIDER' => $providerUser->getId(),
            'DS_PROVIDER' => $provider,
        ]);

        Auth::login($user);

        return redirect($this->redirectTo);
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
                return redirect($this->redirectTo);
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
