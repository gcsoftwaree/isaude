<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterFormRequest;
use App\Models\People;
use App\Models\User;
use App\Models\UserPhone;
use App\Notifications\NewUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use App\Models\UserMail;
use mysql_xdevapi\Exception;

class RegisterController extends Controller
{
    protected UserMail $user_mail;
    public function __construct(){
        $this->user_mail = new UserMail();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('site.register.index');
    }

    public function form(RegisterFormRequest $request){
        $people = People::create([
            'NOME_PESSOA' => $request->NOME_PESSOA,
            'CPF_CNPJ' => $request->CPF_CNPJ,
            'TP_PESSOA' => '1',
            'DT_NASCIMENTO' => $request->DT_NASCIMENTO,
            'DT_CADASTRO' => Carbon::now()
        ]);

        $user = User::create([
            'COD_PESSOA' => $people->COD_PESSOA,
            'TP_TELEFONE'=> '1',
            'DS_LOGIN'=> $people->CPF_CNPJ,
            'DS_SENHA' => Hash::make($request->DS_SENHA),
            'ST_USUARIO' => 'A',
            'DT_ULTIMO_LOGIN' => Carbon::now()

        ]);

        UserMail::create([
            'COD_PESSOA' => $people->COD_PESSOA,
            'ST_EMAIL_PRINCIPAL'=> '1',
            'DS_EMAIL' => $request->DS_EMAIL
        ]);

        UserPhone::create([
            'COD_PESSOA' => $people->COD_PESSOA,
            'TP_TELEFONE'=> '1',
            'ST_TELEFONE_PRINCIPAL'=> '1',
            'NUM_TELEFONE' => $request->NUM_TELEFONE
        ]);

        Notification::route('mail', config('mail.from.address'))
            ->notify(new NewUser($request));
             toastr()->success('Uma confirmação foi enviada ao seu email.', 'Cadastro Realizado');

        Auth::loginUsingId($user->COD_USUARIO);

            return redirect()->route('site.home');
    }


//    /**
//         * Store a newly created resource in storage.
//         *
//         * @param  \Illuminate\Http\Request  $request
//         * @return \Illuminate\Http\Response
//         */
//    public function store(Request $request)
//    {
//
//    }

    /**
     * Show the form for creating a new resource.
     *
     //* @return \Illuminate\Http\Response
     */
//    public function create()
//    {
//        //
//    }
//
//
//
//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function show($id)
//    {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function edit($id)
//    {
//        //
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, $id)
//    {
//        //
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        //
//    }
}
