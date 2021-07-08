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
                    <div style = "width: 55% ">
                        <label for="DT_NASCIMENTO">Data de Nascimento</label>
                        <input id="DT_NASCIMENTO" name="DT_NASCIMENTO" type="date"  tabindex="3"
                                  placeholder="06/07/1999">{{old('DT_NASCIMENTO')}}</input>
                        @error('DT_NASCIMENTO')
                        <div class="required__text">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <div style = "width: 9% ;float: left">
                            <label style = "text-align: center" for="COD_DD">DD</label>
                                    <input id="COD_DD" name="COD_DD" type="text"  tabindex="4"
                                   autofocus value="{{old('COD_DD')}}" >
                            @error('COD_DD')
                            <div class="required__text">{{ $message }}</div>
                            @enderror
                        </div>
                        <div style = "width: 44% ;display: inline-block;margin-right: 361px;">
                            <label for="NUM_TELEFONE">Nrº Telefone</label>
                            <input id="NUM_TELEFONE" name="NUM_TELEFONE" type="text"  tabindex="4" placeholder="Ex: (061) 998348681"
                                   autofocus value="{{old('NUM_TELEFONE')}}" >
                            @error('NUM_TELEFONE')
                            <div class="required__text">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <label for="DS_EMAIL">Email</label>
                    <input id="DS_EMAIL" name="DS_EMAIL" type="text"  tabindex="5" placeholder="Ex: Email@dominio.com"
                           autofocus value="{{old('DS_EMAIL')}}" >
                    @error('DS_EMAIL')
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
