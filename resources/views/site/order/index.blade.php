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

                            <div class="form-group">
                                <label for="">Digite algo</label>
                                <input type="text" class="form-control" name="term" placeholder="Pesquise aqui....." value="{{request()->input('term') }}">
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

                                    <tr><td>Nenhum pedido foi encontrado!</td></tr>
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
