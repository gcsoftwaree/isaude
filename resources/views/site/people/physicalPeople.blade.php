@extends('layouts.site')

@section('content')
    <div class="gray-background">
        <section class="contact__block contact-wrapper">
            <h1 class="display-medium">Um sistema de controle e integração de saúde </h1>
            <p>Fácil acesso e ambiente controlado.</p>
            <section class="contact__options">
                <form class="contact__form" action="{{route('site.physicalPeople.form')}}" method="post">
                    @csrf
                    @if(session('success'))
                        <div>
                            {{session('message')}}
                        </div>
                    @endif
                    <label for="NOME_PESSOA">Nome</label>
                    <input id="NOME_PESSOA" name="NOME_PESSOA" type="text"  tabindex="1" placeholder="Ex: Voldemort Camundongo da Silva"
                           autofocus value="{{old('NOME_PESSOA',$people->NOME_PESSOA)}}" {{isset($people->NOME_PESSOA) ? 'disabled' : ''}}>
                    @error('NOME_PESSOA')
                        <div class="required__text">{{ $message }}</div>
                    @enderror
                    <label for="CPF_CNPJ">Nº Documento</label>
                    <input class="cpf_cnpj" id="CPF_CNPJ" name="CPF_CNPJ" class="CPF_CNPJ" type="text"  tabindex="2"
                           placeholder="Insira o número do documento podendo ser CPF ou CNPJ" value="{{old('CPF_CNPJ',$people->CPF_CNPJ)}}" {{isset($people->CPF_CNPJ) ? 'disabled' : ''}} >
                    @error('CPF_CNPJ')
                        <div class="required__text">{{ $message }}</div>
                    @enderror
                    <label for="DS_EMAIL">Email</label>
                    <input id="DS_EMAIL" name="DS_EMAIL" type="text"  tabindex="3" placeholder="Ex: Email@dominio.com"
                           autofocus value="{{old('DS_EMAIL',$people->mail->DS_EMAIL)}}" {{isset($people->mail->DS_EMAIL) ? 'disabled' : ''}}>
                    @error('DS_EMAIL')
                    <div class="required__text">{{ $message }}</div>
                    @enderror
                    <div style = "width: 44% ;">
                        <label for="NUM_TELEFONE">Nrº Telefone</label>
                        <input class = "phone_with_ddd" id="NUM_TELEFONE" name="NUM_TELEFONE" type="text"  tabindex="4" placeholder="Ex: (061) 998348681"
                               autofocus value="{{old('NUM_TELEFONE',$people->NUM_TELEFONE)}}" {{isset($people->NUM_TELEFONE) ? 'disabled' : ''}}>
                        @error('NUM_TELEFONE')
                        <div class="required__text">{{ $message }}</div>
                        @enderror
                    </div>
                    <div style = "width: 44% ">
                        <label for="DT_NASCIMENTO">Data de Nascimento</label>
                        <input id="DT_NASCIMENTO" name="DT_NASCIMENTO" type="date"  tabindex="5" value="{{old('DT_NASCIMENTO')}}" >
                        @error('DT_NASCIMENTO')
                            <div class="required__text">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="NOME_MAE">Nome da Mãe</label>
                        <input id="NOME_MAE" name="NOME_MAE" type="text"  tabindex="6" value="{{old('NOME_MAE')}}" >
                        @error('NOME_MAE')
                        <div class="required__text">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="NOME_PAI">Nome do Pai</label>
                        <input id="NOME_PAI" name="NOME_PAI" type="text"  tabindex="7" value="{{old('NOME_PAI')}}" >
                        @error('NOME_PAI')
                        <div class="required__text">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                    <label for="COD_TIPO_GENERO" class="form-label" >Gênero</label>
                    <select class="form-select" name="COD_TIPO_GENERO" tabindex="8" aria-label="Default select example">
                        <option value="" >::Selecione::</option>
                        @foreach($genders as $gender)
                            <option value="{{$gender->COD_TIPO_GENERO}}">{{$gender->NOME_TIPO_GENERO}}</option>
                        @endforeach

                    </select>
                    @error('COD_TIPO_GENERO')
                    <br>
                    <div class="required__text">{{ $message }}</div>
                    @enderror
                    <label for="COD_ESTADO_CIVIL" class="form-label" >Estado Cívil</label>
                    <select class="form-select" name="COD_ESTADO_CIVIL" tabindex="9" aria-label="Default select example">
                        <option value="" >::Selecione::</option>
                        @foreach($maritalStatus as $stauts)
                            <option value="{{$stauts->COD_ESTADO_CIVIL}}">{{$stauts->NOME_ESTADO_CIVIL}}</option>
                        @endforeach

                    </select>
                    @error('COD_ESTADO_CIVIL')
                    <br>
                    <div class="required__text">{{ $message }}</div>
                    @enderror
                    <label for="COD_NIVEL_ESCOLARIDADE" class="form-label" >Escolaridade</label>
                    <select class="form-select" name="COD_NIVEL_ESCOLARIDADE" tabindex="10" aria-label="Default select example">
                        <option value="" >::Selecione::</option>
                        @foreach($educations as $education)
                            <option value="{{$education->COD_NIVEL_ESCOLARIDADE}}" >{{$education->NOME_NIVEL_ESCOLARIDADE}}</option>
                        @endforeach
                    </select>
                    @error('COD_NIVEL_ESCOLARIDADE')
                        <br>
                        <div class="required__text">{{ $message }}</div>
                    @enderror
                    </div>
                    <div style="width: 45%;  margin: auto;">
                        <input type="hidden" value="{{$people->COD_PESSOA}}" tabindex="11" name="COD_PESSOA">
                        <button class="button button_primary" type="submit">Salvar</button>
                        <button class="button button_primary" type="button"  onclick="window.location='{{route('site.home')}}}'" >Cancelar</button>
                    </div>
                </form>
            </section>
        </section>
    </div>
    <script src="{{asset('js/masks.js')}}"></script>
@endsection
