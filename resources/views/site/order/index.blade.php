@extends('layouts.site')

@section('content')

<div>
    <div class="mx-auto pull-right">
        <section class="contact__block contact-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-6" style="margin-top:40px">
                        <h4>Procurar Pedidos</h4><hr>
                        <form action="{{route('site.order.search')}}" method="GET">

                            <div class="mb-3">
                                <label for="pedido" class="form-label" >Número Pedido</label>
                                    <input type="text" class="form-control" name="pedido"  value="{{request()->input('pedido') }}">
                            </div>
                            <div class="mb-3">
                                <label for="periodo" class="form-label" >Periodo Solicitação</label>
                                <input type="date" class="form-control" name="periodoDe"  value="{{request()->input('periodoDe') }}">
                                <label for="periodo" class="form-label" >A</label>
                                <input type="date" class="form-control" name="periodoAte"  value="{{request()->input('periodoAte') }}">
                            </div>
                            <div class="mb-3">
                                <label for="situacao" class="form-label" >Situação Receita</label>
                                <select class="form-select" name="situacao" aria-label="Default select example">
                                    <option value="">::Selecione::</option>
                                    <option value="A" {{request()->input('situacao') == 'A' ? 'selected' : '' }}>Ativo</option>
                                    <option value="P" {{request()->input('situacao') == 'P' ? 'selected' : '' }}>Pendente</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tag" class="form-label" >Tags</label>
                                <input type="text" class="form-control tagin" name="tag"  value="{{request()->input('tag') }}">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Pesquisar</button>
                                <button type="button" class="btn btn-primary" onclick="window.location='{{route('site.order.create')}}'">Novo</button>
                            </div>
                        </form>
                        <br>
                        <br>
                        <hr>
                        <br>
                        @if(isset($orders))
                            <table class="table table-hover">
                                @if(count($orders) > 0)
                                <thead>
                                <tr>
                                    <th>Nº Pedido</th>
                                    <th>Descrição</th>
                                    <th>Data Cadastro</th>
                                    <th>Situação</th>
                                    <th>Tag</th>
                                    <th>Deletar</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->COD_PEDIDO }}</td>
                                            <td>{{ $order->DS_PEDIDO  }}</td>
                                            <td>{{ $order->DT_PEDIDO  }}</td>
                                            <td>{{ $order->ST_PEDIDO  }}</td>
                                            <td>{{ $order->tag->DS_PEDIDO_TAG  }}</td>
                                            <td><button type="button" data-id="{{ $order->COD_PEDIDO }}"  class=user_dialog data-bs-toggle="modal" data-bs-target="#orderModal"><i class="fa fa-trash-o"></i></button></td>
                                        </tr>
                                    @endforeach
                                @else

                                    <tr><td>Nenhum registro encontrado.</td></tr>
                                @endif
                                </tbody>
                            </table>

                            <div class="pagination">
                                    {{$orders->links('pagination::bootstrap-4')}}
                            </div>
                        @endif
                        <div class="modal fade" id="orderModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Deletar Pedido</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{route('site.order.update')}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <p class="text-center">
                                                Confirma a remoção do pedido?
                                            </p>
                                            <input type="hidden" name="id" id="data_id" value="">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Não</button>
                                            <button type="submit" class="btn btn-primary">Sim</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script>
    tagin( document.querySelector('.tagin') );
</script>
@endsection
