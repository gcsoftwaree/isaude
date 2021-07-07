@extends('layouts.site')

@section('content')
    <div class="gray-background">
        <section class="contact__block contact-wrapper">
            <h1 class="display-medium">Um sistema de controle e integração de saúde </h1>
            <p>Fácil acesso e ambiente controlado.</p>
            <section class="contact__options">
                <form class="contact__form" action="{{route('site.register.form')}}" method="post">
                    @csrf
                    @if(session('success'))
                        <div>
                            {{session('message')}}
                        </div>
                    @endif
                    <div>
                    </div>
                    <label for="NOME_PESSOA">Nome</label>
                    <input id="NOME_PESSOA" name="NOME_PESSOA" type="text"  tabindex="1" placeholder="Ex: Voldemort Camundongo da Silva"
                           autofocus value="{{old('NOME_PESSOA')}}" >
                    @error('NOME_PESSOA')
                    <div class="required__text">{{ $message }}</div>
                    @enderror
                    <label for="CPF_CNPJ">Nº Documento</label>
                    <input id="CPF_CNPJ" name="CPF_CNPJ" type="text"  tabindex="2"
                           placeholder="Insira o número do documento podendo ser CPF ou CNPJ" value="{{old('CPF_CNPJ')}}" >
                    @error('CPF_CNPJ')
                    <div class="required__text">{{ $message }}</div>
                    @enderror

                    <div>
                        <div style = "width: 50% ;display: inline-block;">
                            <label for="DT_NASCIMENTO">Data de Nascimento</label>
                            <input id="DT_NASCIMENTO" name="DT_NASCIMENTO" type="date"  tabindex="3"
                                      placeholder="06/07/1999">{{old('DT_NASCIMENTO')}}</input>
                            @error('DT_NASCIMENTO')
                            <div class="required__text">{{ $message }}</div>
                            @enderror
                        </div>
                        <div style = "width: 49% ;display: inline-block;">
                            <label for="TP_PESSOA">Tipo Pessoa</label>
                            <input id="TP_PESSOA" name="TP_PESSOA" type="number"  tabindex="4"
                            >{{old('TP_PESSOA')}}</input>
                            @error('TP_PESSOA')
                            <div class="required__text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <label for="DT_CADASTRO">Data cadastro</label>
                    <input id="DT_CADASTRO" name="DT_CADASTRO" type="date"  tabindex="3"
                           placeholder="06/07/1999">{{old('DT_CADASTRO')}}</input>
                    @error('DT_CADASTRO')
                    <div class="required__text">{{ $message }}</div>
                    @enderror

                    <div style="width: 45%;  margin: auto;">
                        <button class="button button_primary" type="submit">Cadastrar</button>
                    </div>
                </form>
            </section>
        </section>
        </div>
@endsection
