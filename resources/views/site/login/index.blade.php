@extends('layouts.site')

@section('content')

{{--    <div class="container">--}}
{{--        <div class="d-flex justify-content-end h-100">--}}
{{--            <div class="card2">--}}
{{--                <div class="card-header2">--}}
{{--                    <a href="{{route('site.register.form')}}"><h3>Cadastra-se</h3></a>--}}
{{--                    <div class="d-flex justify-content-end social_icon">--}}
{{--                        <span><i class="bi bi-facebook"></i></span>--}}
{{--                        <span><i class="bi bi-google"></i></span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <form action="{{route('site.login.form')}}" method="post">--}}
{{--                    @csrf--}}
{{--                    @if(session('success'))--}}
{{--                        <div>--}}
{{--                            {{session('message')}}--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    @if ($errors->any())--}}
{{--                        <div class="alert alert-danger">--}}
{{--                            <ul class="list-group">--}}
{{--                                @foreach ($errors->all() as $error)--}}
{{--                                    <li class="required__login">{{ $error }}</li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    <div class="mb-3">--}}
{{--                        <label for="DS_LOGIN" class="form-label">Usuário</label>--}}
{{--                        <input type="text" class="form-control" name="DS_LOGIN">--}}
{{--                    </div>--}}
{{--                    <div class="mb-3">--}}
{{--                        <label for="DS_SENHA" class="form-label">Senha</label>--}}
{{--                        <input type="password" class="form-control" name="DS_SENHA">--}}
{{--                    </div>--}}
{{--                    <button type="submit" class="btn btn-primary">Login</button>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


{{--    <div class="container">--}}
{{--        <div class="d-flex justify-content-end h-100">--}}
{{--            <div class="card2">--}}
{{--                <div class="card-header2">--}}
{{--                    <h3>Cadastra-se</h3>--}}
{{--                    <div class="d-flex justify-content-end social_icon">--}}
{{--                        <span><i class="bi bi-facebook"></i></span>--}}
{{--                        <span><i class="bi bi-google"></i></span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card-corpo">--}}
{{--                <form action="{{route('site.login.form')}}" method="post">--}}
{{--                <div class="input-group form-group">--}}
{{--                    <div class="input-ground-prepend">--}}
{{--                        <span class="input-group-text"><i class="bi bi-person-fill"></i></span>--}}
{{--                    </div>--}}
{{--                    <input type="text" class="form-control" placeholder="Usuário">--}}
{{--                </div>--}}
{{--                <div class="input-group form-group">--}}
{{--                    <div class="input-ground-prepend">--}}
{{--                        <span class="input-group-text"><i class="bi bi-key-fill"></i></span>--}}
{{--                    </div>--}}
{{--                    <input type="password" class="form-control" placeholder="Senha">--}}
{{--                </div>--}}
{{--                    <div class="row align-items-center remember">--}}
{{--                        <input type="submit" class="btn float-right login_btn">--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}


{{--        </div>--}}
{{--    </div>--}}




    <div class="black-background">
        <section class="contact__block contact-wrapper">
            <h1 class="display-medium">Um sistema de controle e integração de saúde </h1>
            <p>Fácil acesso e ambiente controlado.</p>
            <section class="contact__options">
                <form class="login__form" action="{{route('site.login.form')}}" method="post">
                    @csrf
                    @if(session('success'))
                        <div>
                            {{session('message')}}
                        </div>
                    @endif
                    <div>
                        <a class="title-medium" href="{{route('site.register.form')}}"> Cadastre-se</a>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="required__login">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <label for="DS_LOGIN">Login</label>
                    <input class="cpf_cnpj" id="DS_LOGIN" name="DS_LOGIN" type="text"  tabindex="1" placeholder=""
                           autofocus value="{{old('DS_LOGIN')}}" >
                    <label for="DS_SENHA">Senha</label>
                    <input  id="DS_SENHA" name="DS_SENHA"  type="password"  tabindex="2" placeholder=""
                           autofocus value="{{old('DS_SENHA')}}" >
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="login-button">
                                    <button class="btn btn-primary" type="submit">Login</button>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-md-center">
                            <div class="col col-lg-2">
                                <div class="button-google">
                                     <a class="grade-google" href="{{ route('social.login',['provider' => 'google']) }}">
                                         <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" alt="">
                                     </a>
                                </div>
                            </div>
                            <div class="col col-lg-2">
                                <div class="button-facebook">
                                    <a class="grade-facebook" href="{{ route('social.login',['provider' => 'facebook']) }}">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/22/Icon_Facebook.svg/1200px-Icon_Facebook.svg.png" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <br>
                        <a href="{{route('site.login.forgot')}}"> Esqueci minha senha</a>
                    </div>
                </form>
            </section>
        </section>
    </div>



@endsection
