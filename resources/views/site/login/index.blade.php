@extends('layouts.site')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="login-form bg-light mt-4 p-4">
                    <form action="{{route('site.login.form')}}" method="post" class="row g-3">
                        @csrf
                        @if(session('success'))
                            <div>
                                {{session('message')}}
                            </div>
                        @endif
                        <h4>Bem vindo de volta</h4>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li class="required__login">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="col-12">
                            <label for="DS_LOGIN">Login</label>
                            <input  type="text" id="DS_LOGIN" name="DS_LOGIN" class="cpf_cnpj form-control" tabindex="1" placeholder=""
                                   autofocus value="{{old('DS_LOGIN')}}">
                        </div>
                        <div class=" col-12">
                            <label for="DS_SENHA">Senha</label>
                            <div class="input-group">
                                <input  type="password" id="DS_SENHA" name="DS_SENHA" class="form-control" tabindex="2" placeholder=""
                                        autofocus value="{{old('DS_SENHA')}}">
                                <span class="input-group-text " onclick="password_show_hide();">
                                  <i class="fas fa-eye" id="show_eye"></i>
                                  <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                </span>
                            </div>

                        </div>

                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-2">
                                <div class="button-google">
                                     <a class="grade-google" href="{{ route('social.login',['provider' => 'google']) }}">
                                         <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" alt="">
                                     </a>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="button-facebook">
                                    <a class="grade-facebook" href="{{ route('social.login',['provider' => 'facebook']) }}">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/22/Icon_Facebook.svg/1200px-Icon_Facebook.svg.png" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-dark ">Login</button>
                        </div>
                    </form>
                    <hr class="mt-4">
                    <div class="col-12">
                        <p class="text-center mb-0">Não tem uma conta? <a href="{{route('site.register.form')}}">Cadastra-se</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('js/password.js')}}"></script>

@endsection
