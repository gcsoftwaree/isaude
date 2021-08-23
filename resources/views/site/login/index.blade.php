@extends('layouts.site')

@section('content')
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">
                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Isaude</h2>
                                <p class="text-white-50 mb-5">Por favor forneça seu cpf/cnpj e senha!</p>
                                <form action="{{route('site.login.form')}}" method="post" class="row g-3">
                                    @csrf
                                    @if(session('success'))
                                        <div>
                                            {{session('message')}}
                                        </div>
                                    @endif
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li class="float-start"><h6>{{ $error }}</h6></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="form-outline form-white my-4">
                                        <label class="form-label float-start" for="DS_LOGIN"><h6>Login</h6></label>
                                        <input type="text" id="DS_LOGIN" name="DS_LOGIN" class="form-control form-control-lg cpf_cnpj" tabindex="1" placeholder=""
                                           autofocus value="{{old('DS_LOGIN')}}" />
                                    </div>

                                    <div class="form-outline form-white my-4">
                                        <label class="form-label float-start" for="DS_SENHA"><h6>Senha</h6></label>
                                        <div class="input-group">
                                            <input type="password" id="DS_SENHA" name="DS_SENHA" class="form-control form-control-lg" tabindex="2" placeholder=""
                                                     autofocus value="{{old('DS_SENHA')}}"/>
                                            <span class="input-group-text " onclick="password_show_hide();">
                                              <i class="fas fa-eye" id="show_eye"></i>
                                              <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="{{route('site.forgot.form')}}">Esqueceu sua senha?</a></p>
                                    <div class="text-center">
                                        <button class="btn btn-outline-light btn-lg w-auto px-5" type="submit">Login</button>
                                    </div>

                                    <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                        <a href="{{ route('social.login',['provider' => 'facebook']) }}" class="text-white"><i class="fab fa-facebook-f fa-lg mx-4 px-2"></i></a>
                                        <a href="{{ route('social.login',['provider' => 'google']) }}" class="text-white"><i class="fab fa-google fa-lg mx-4 px-2"></i></a>
                                    </div>
                                </form>
                            </div>
                            <div>
                                <p class="mb-0"><h6>Não tem uma conta?<a href="{{route('site.register.form')}}" class="text-white-50 fw-bold"> Cadastre-se</a></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{asset('js/password.js')}}"></script>
@endsection
