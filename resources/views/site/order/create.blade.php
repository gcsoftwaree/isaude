@extends('layouts.site')

@section('content')
    <script type="text/javascript" src="{{asset('js/file.js')}}"></script>
    <div class="gray-background">
        <section class="contact__block contact-wrapper">
            <h1 class="display-medium">Um sistema de controle e integração de saúde </h1>
            <p>Fácil acesso e ambiente controlado.</p>
            <section class="contact__options">
                <form onsubmit="addFile()" class="contact__form" action="{{route('site.order.register')}}" id="fileForm"  enctype="multipart/form-data" method="post">
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
                    <div class="mb-3" id="inputFiles">
                        <label for="formFileMultiple" class="form-label" >Files</label>
                        <input class="form-control input-esconder" type="file" onchange="showFiles(this)" id="files" name="files[]" multiple>
                    </div>
                    <nav class="navbar navbar-expand navbar-light" style="display: block">
                        <div class="container-fluid" style="display: block">
                            <ul class="navbar-nav" id="fileList">
                            </ul>
                        </div>
                    </nav>
                    <input type="file" id="addFile">
                    @error('files.*')
                    <div class="required__text">{{ $message }}</div>
                    @enderror
                    @error('files')
                    <div class="required__text">{{ $message }}</div>
                    @enderror
                    <div style="width: 45%;  margin: auto;">
                        <button class="button button_primary" type="submit" >Cadastrar</button>
                        <button type="button" class="btn btn-primary" onclick="window.location='{{route('site.order')}}'" >Voltar</button>
                    </div>
                </form>
            </section>
        </section>
    </div>

@endsection
