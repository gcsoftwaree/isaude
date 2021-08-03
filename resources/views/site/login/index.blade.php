@extends('layouts.site')

@section('content')
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
                    <div style="width: 45%;  margin: auto;">
                        <button class="button button_primary" type="submit">Login</button>
                    </div>
                    <div class="google-btn">
                        <div class="google-icon-wrapper">
                            <img class="google-icon" src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" alt=""/>
                        </div>
                        <a class="btn-text" href ="{{ route('social.login',['provider' => 'google']) }}"><b>Logue com o google</b></a>
                    </div>
                    <div style="width: 45%;  margin: auto;">
                        <a class=""   href ="{{ route('social.login',['provider' => 'facebook']) }}" data-size="large" data-layout="default" data-auto-logout-link="false" data-use-continue-as="false">Login com Facebook</a>
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
