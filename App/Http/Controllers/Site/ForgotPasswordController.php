<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResetFormRequest;
use App\Models\Link;
use App\Models\User;
use App\Models\UserMail;
use App\Notifications\NewUser;
use App\Notifications\ResetPassword;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;


class nForgotPasswordController extends Controller
{

    public function forgetPasswordForm(Request $request)
    {
        $request->validate([
            'DS_EMAIL' => 'required|email|exists:TB_GLB_PESSOA_EMAIL',
        ]);

        $token = Str::random(64);
        $user = UserMail::where('DS_EMAIL', $request->DS_EMAIL)->first();

        Link::create([
            'COD_PESSOA' => $user->COD_PESSOA,
            'TP_LINK_TMP' => 'S',
            'DS_TOKEN' => $token,
            'DT_CADASTRO' => Carbon::now(),
        ]);

        Notification::route('mail', config('mail.from.address'))
            ->notify(new ResetPassword($token));
        toastr()->success('Enviamos um link de reset de senha ao seu email.', '');

        return redirect()->route('site.login');
    }

    public function showResetPasswordForm($token) {
        return view('site.reset', ['token' => $token]);
    }

    public function submitResetPasswordForm(ResetFormRequest $request)
    {

        $user = UserMail::where('DS_EMAIL', $request->DS_EMAIL)->first();

        $updatePassword = Link::where(['COD_PESSOA' => $user->COD_PESSOA,'DS_TOKEN' => $request->token])->first();

        if(!$updatePassword){
            toastr()->error('','Token Inválido');
            return back()->withErrors([
                'DS_EMAIL' => ['Seu email não corresponde ao enviado para troca de senha.']
            ]);
        }

         User::where('COD_PESSOA', $user->COD_PESSOA)
            ->update(['DS_SENHA' => Hash::make($request->DS_SENHA)]);

        Link::where(['DS_TOKEN'=> $request->token])->delete();

        toastr()->success('Sua senha foi redefina com sucesso!');

        return redirect()->route('site.login');
    }
use SendsPasswordResetEmails;
}
