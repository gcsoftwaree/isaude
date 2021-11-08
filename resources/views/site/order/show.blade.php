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
                    <label for="DT_PEDIDO">Data Cadastro</label>
                    <input id="DT_PEDIDO" name="DT_PEDIDO" type="date"
                            value="{{$order->DT_PEDIDO}}" disabled>
                    <label for="DS_PEDIDO_TAG">Título</label>
                    <input id="DS_PEDIDO_TAG" name="DS_PEDIDO_TAG" type="text"
                            value="{{$order->tag->DS_PEDIDO_TAG}}" disabled>
                    <label for="DS_PEDIDO">Descrição</label>
                    <input id="DS_PEDIDO" name="DS_PEDIDO" type="text"
                           value="{{$order->DS_PEDIDO}}" disabled>
                    <label for="ST_PEDIDO">Situação</label>
                    <input id="ST_PEDIDO" name="ST_PEDIDO" type="text"
                           value="{{$order->ST_PEDIDO}}" disabled>
                    <div style="width: 45%;  margin: auto;">

                        @if(session('CPF_CNPJ'))
                            @if(strlen(session('CPF_CNPJ')) == 11 || strlen(session('CPF_CNPJ')) == 14 )
                                <button type="button" class="btn btn-primary" onclick="window.location='{{route("site.physicalPeople",session('COD_PESSOA'))}}'" >Solicitar cotação</button>
                            @else
                                <button type="button" class="btn btn-primary" onclick="window.location='{{route("site.legalPeople",session('COD_PESSOA'))}}'" >Solicitar cotação</button>
                            @endif
                        @else
                            <button type="button" class="user_dialog button button_primary" data-bs-toggle="modal" data-bs-target="#orderModal">Solicitar cotação</button>
                        @endif

                        <button type="button" class="btn btn-primary" onclick="window.location='{{route('site.order')}}'" >Voltar</button>
                    </div>
                </form>
            </section>
        </section>
    </div>


    <div class="modal fade" id="orderModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('site.order.update')}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <h4 class="text-center">
                            Para sua segurança é necessário complementar seus dados de acesso
                        </h4>
                        <input type="hidden" name="id" id="data_id" value="">
                        <p class="text-center">
                            Como deseja atualizar seus dados?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" onclick="window.location='{{route("site.physicalPeople",session('COD_PESSOA'))}}'">Pessoa Física</button>
                        <button type="button" class="btn btn-primary" onclick="window.location='{{route("site.legalPeople",session('COD_PESSOA'))}}'">Pessoa Júridica</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        tagin( document.querySelector('.tagin') );
        $('input').tagsinput({
            maxTags: 1
        });
    </script>

@endsection
