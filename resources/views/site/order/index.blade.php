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
                                    <option value="{{request()->input('situacao') }}" selected>::Selecione::</option>
                                    <option value="A" >Ativo</option>
                                    <option value="P">Pendente</option>
                                    <option value="I">Inativo</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tag" class="form-label" >Tags</label>
                                <input type="text" class="form-control" name="tag"  value="{{request()->input('tag') }}">
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
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>{{ $order->COD_PEDIDO }}</td>
                                            <td>{{ $order->DS_PEDIDO  }}</td>
                                            <td>{{ $order->DT_PEDIDO  }}</td>
                                            <td>{{ $order->ST_PEDIDO  }}</td>
                                        </tr>
                                    @endforeach
                                @else

                                    <tr><td>Nenhum registro encontrado.</td></tr>
                                @endif
                                </tbody>
                            </table>

                            <div class="pagination">
                                    {{$orders->links('pagination::bootstrap-4')}}
                                    {{$orders->appends(request()->input())->links('pagination::bootstrap-4')}}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
