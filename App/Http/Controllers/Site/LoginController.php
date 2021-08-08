<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Models\People;
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

            return view('site.home.index');
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
        $login = $providerUser->getEmail() ?? $providerUser->getName();

        $user = User::firstOrCreate(['DS_LOGIN' => $providerUser->getEmail()],[
            'DS_LOGIN' => $login,
            'ID_PROVIDER' => $providerUser->getId(),
            'DS_PROVIDER' => $provider,
        ]);

        Auth::login($user);
        session(['DS_LOGIN' => $login]);

        return redirect($this->redirectTo);
    }
    public function authenticate(LoginFormRequest $request)
    {
        $credentials = [
            'DS_LOGIN' => $request->DS_LOGIN,
            'password' => $request->DS_SENHA
        ];
        $userStatus = User::where('ST_USUARIO', 'A')->where('DS_LOGIN', $request->DS_LOGIN)->first();
        $peopleName = People::where('COD_PESSOA', $userStatus->COD_PESSOA)->first();
        if (Auth::attempt($credentials)) {
            if ($userStatus) {
                $request->session()->put('DS_LOGIN', $request->DS_LOGIN);
                $request->session()->put('NOME_PESSOA', $peopleName->NOME_PESSOA);
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
