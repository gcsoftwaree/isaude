@extends('layouts.site')

@section('content')
    <div class="gray-background">
        <section class="contact__block contact-wrapper">
            <h1 class="display-medium">Um sistema de controle e integração de saúde </h1>
            <p>Fácil acesso e ambiente controlado.</p>
            <section class="contact__options">
                <form class="contact__form" action="{{route('site.legalPeople.form')}}" method="post">
                    @csrf
                    <div style="width: 45%;  margin: auto;">
                        <button type="button" class="user_dialog button button_primary" data-bs-toggle="modal" data-bs-target="#orderModal">Botão</button>
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
    <script src="{{asset('js/masks.js')}}"></script>
@endsection
