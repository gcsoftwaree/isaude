@extends('layouts.site')

@section('content')
    <script type="text/javascript" src="{{asset('js/file.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/tagin.min.js')}}"></script>
    <div class="gray-background">
        <section class="contact__block contact-wrapper">
            <h1 class="display-medium">Um sistema de controle e integração de saúde </h1>
            <p>Fácil acesso e ambiente controlado.</p>
            <section class="contact__options">
                <form  class="contact__form" enctype="multipart/form-data" method="post">
                    @csrf
                    <label for="DT_CADASTRO">Titulo</label>
                    <input id="DT_CADASTRO" name="DT_CADASTRO" type="date" class="tagin" tabindex="1"
                           autofocus value="{{$order->tag->DT_CADASTRO}}">
                    <label for="DS_PEDIDO_TAG">Titulo</label>
                    <input id="DS_PEDIDO_TAG" name="DS_PEDIDO_TAG" type="text" class="tagin" tabindex="1"
                           autofocus value="{{$order->tag->DS_PEDIDO_TAG}}">
                    <label for="DS_PEDIDO">Descrição</label>
                    <input id="DS_PEDIDO" name="DS_PEDIDO" type="text"  tabindex="2"
                           value="{{$order->DS_PEDIDO}}">
                    <label for="ST_PEDIDO">Descrição</label>
                    <input id="ST_PEDIDO" name="ST_PEDIDO" type="text"  tabindex="2"
                           value="{{$order->ST_PEDIDO}}">
                    <div style="width: 45%;  margin: auto;">
                        <button type="button" class="btn btn-primary" onclick="window.location='{{route('site.order')}}'" >Voltar</button>
                    </div>
                </form>
            </section>
        </section>
    </div>
    <script>
        tagin( document.querySelector('.tagin') );
        $('input').tagsinput({
            maxTags: 1
        });
    </script>

@endsection
