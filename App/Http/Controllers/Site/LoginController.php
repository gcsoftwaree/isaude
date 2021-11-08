<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Models\People;
use App\Models\User;
use App\Models\UserMail;
use App\Providers\RouteServiceProvider;
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

        if($providerUser->getname()) {
            People::firstOrCreate(['NOME_PESSOA' => $providerUser->getname()], [
                'NOME_PESSOA' => $login,
                'TP_PESSOA' => 1,
            ]);
        }

        if($providerUser->getEmail()){
            $people =People::firstOrCreate(['NOME_PESSOA' => $providerUser->getname()], [
                'TP_PESSOA' => 1,
            ]);

            UserMail::firstOrCreate(['DS_EMAIL' => $providerUser->getEmail()], [
                'COD_PESSOA' => $people->COD_PESSOA,
                'DS_EMAIL' => $login
            ]);

        }

        $user = User::firstOrCreate(['DS_LOGIN' => $providerUser->getEmail()],[
            'COD_PESSOA' => $people->COD_PESSOA,
            'DS_LOGIN' => $login,
            'ID_PROVIDER' => $providerUser->getId(),
            'DS_PROVIDER' => $provider,
        ]);
        
        $userStatus = User::where('ST_USUARIO', 'A')->where('DS_LOGIN', $login)->first();

        Auth::login($user);
        if($userStatus) {
            session()->put('COD_PESSOA', $userStatus->COD_PESSOA);
            session()->put('CPF_CNPJ', $people->CPF_CNPJ ?? '');
            session()->put('DS_LOGIN', $login);
            session()->put('NOME_PESSOA', $people->NOME_PESSOA ?? '');
            toastr()->success('Login Realizado');
            return redirect($this->redirectTo);
        }


        return Redirect::back()->withErrors('Usuário Inativo');
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
                $request->session()->put('COD_PESSOA', $peopleName->COD_PESSOA);
                $request->session()->put('CPF_CNPJ', $peopleName->CPF_CNPJ);
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

    public function logout()
    {
        session_unset();
        Auth::logout();

        return redirect()->intended('/');
    }
}
