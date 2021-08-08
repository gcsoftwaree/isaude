@extends('layouts.site')

@section('content')
    <div class="gray-background">
        <section class="contact__block contact-wrapper">
            <h1 class="display-medium">Um sistema de controle e integração de saúde </h1>
            <p>Fácil acesso e ambiente controlado.</p>
            <section class="contact__options">
                <form class="contact__form" action="{{route('site.order.register')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    @if(session('success'))
                        <div>
                            {{session('message')}}
                        </div>
                    @endif
                    <label for="DS_PEDIDO_TAG">Titulo</label>
                    <input id="DS_PEDIDO_TAG" name="DS_PEDIDO_TAG" type="text"  tabindex="1"
                           autofocus value="{{old('DS_PEDIDO_TAG')}}" >
                    @error('DS_PEDIDO_TAG')
                    <div class="required__text">{{ $message }}</div>
                    @enderror
                    <label for="DS_PEDIDO">Descrição</label>
                    <input class="cpf_cnpj" id="DS_PEDIDO" name="DS_PEDIDO" type="text"  tabindex="2"
                            value="{{old('DS_PEDIDO')}}" >
                    @error('DS_PEDIDO')
                    <div class="required__text">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label" >Receita</label>
                        <input class="form-control" type="file" id="formFileMultiple" name="files[]" multiple>
                    </div>
                    @error('files.*')
                    <div class="required__text">{{ $message }}</div>
                    @enderror
                    @error('files')
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
