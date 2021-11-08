@extends('layouts.site')

@section('content')
    <div class="gray-background">
        <section class="contact__block contact-wrapper">
            <h1 class="display-medium">Um sistema de controle e integração de saúde </h1>
            <p>Fácil acesso e ambiente controlado.</p>
            <section class="contact__options">
                <form class="contact__form" action="{{route('site.legalPeople.form')}}" method="post">
                    @csrf
                    @if(session('success'))
                        <div>
                            {{session('message')}}
                        </div>
                    @endif
                    <label for="NOME_PESSOA">Nome</label>
                    <input id="NOME_PESSOA" name="NOME_PESSOA" type="text"  tabindex="1" placeholder="Ex: Voldemort Camundongo da Silva"
                           autofocus value="{{old($people->NOME_PESSOA)}}" {{isset($people->NOME_PESSOA) ? 'disabled' : ''}}>
                    @error('NOME_PESSOA')
                        <div class="required__text">{{ $message }}</div>
                    @enderror
                    <label for="CPF_CNPJ">Nº Documento</label>
                    <input class="cpf_cnpj" id="CPF_CNPJ" name="CPF_CNPJ" class="CPF_CNPJ" type="text"  tabindex="2"
                           placeholder="Insira o número do documento podendo ser CPF ou CNPJ" value="{{old($people->CPF_CNPJ)}}" {{isset($people->CPF_CNPJ) ? 'disabled' : ''}} >
                    @error('CPF_CNPJ')
                        <div class="required__text">{{ $message }}</div>
                    @enderror
                    <label for="DS_EMAIL">Email</label>
                    <input id="DS_EMAIL" name="DS_EMAIL" type="text"  tabindex="3" placeholder="Ex: Email@dominio.com"
                           autofocus value="{{old($people->mail->DS_EMAIL)}}" {{isset($people->mail->DS_EMAIL) ? 'disabled' : ''}}>
                    @error('DS_EMAIL')
                    <div class="required__text">{{ $message }}</div>
                    @enderror
                    <div style = "width: 44% ;">
                        <label for="NUM_TELEFONE">Nrº Telefone</label>
                        <input class = "phone_with_ddd" id="NUM_TELEFONE" name="NUM_TELEFONE" type="text"  tabindex="4" placeholder="Ex: (061) 998348681"
                               autofocus value="{{old($people->NUM_TELEFONE)}}" {{isset($people->NUM_TELEFONE) ? 'disabled' : ''}}>
                        @error('NUM_TELEFONE')
                        <div class="required__text">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="NOME_FANTASIA">Nome Fantasia</label>
                        <input id="NOME_FANTASIA" name="NOME_FANTASIA" type="text"  tabindex="6" value="{{old('NOME_FANTASIA')}}" >
                        @error('NOME_FANTASIA')
                        <div class="required__text">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="NOME_RAZAO_SOCIAL">Nome Fantasia</label>
                        <input id="NOME_RAZAO_SOCIAL" name="NOME_RAZAO_SOCIAL" type="text"  tabindex="6" value="{{old('NOME_RAZAO_SOCIAL')}}" >
                        @error('NOME_RAZAO_SOCIAL')
                        <div class="required__text">{{ $message }}</div>
                        @enderror
                    </div>
                    <div style="width: 45%;  margin: auto;">
                        <input type="hidden" value="{{old($people->COD_PESSOA)}}"  name="COD_PESSOA">
                        <button class="button button_primary" type="submit">Salvar</button>
                        <button class="button button_primary" type="button"  onclick="window.location='{{route('site.home')}}}'" >Cancelar</button>
                    </div>
                </form>
            </section>
        </section>
    </div>
    <script src="{{asset('js/masks.js')}}"></script>
@endsection
