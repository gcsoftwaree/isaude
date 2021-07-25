@extends('layouts.site')
<div class="gray-background">
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
                <label for="DS_EMAIL">Email</label>
                <input id="DS_EMAIL" name="DS_EMAIL" type="text"  tabindex="1" placeholder=""
                       autofocus value="{{old('DS_EMAIL')}}" >
                <div style="width: 45%;  margin: auto;">
                    <button class="button button_primary" type="submit">Login</button>
                </div>
                <div>
                    <br>
                    <a href="{{route('site.login.forgot')}}"> Esqueci minha senha</a>
                </div>
            </form>
        </section>
    </section>
</div>
