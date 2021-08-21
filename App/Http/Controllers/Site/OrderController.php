<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderFormRequest;
use App\Models\Document;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderTag;
use App\Models\User;
use App\Notifications\NewOrder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    public function index(){
        if(Auth::check()){

            return view('site.order.index');
        }

        return view('site.login.index');
    }

    public function create(){
        if(Auth::check()){

            return view('site.order.create');
        }

        return view('site.login.index');
    }

    public function register(OrderFormRequest $request){

        $user = User::where('DS_LOGIN', $request->session()->get('DS_LOGIN'))->first();

        $order = Order::create([
            'COD_PESSOA' => $user->COD_PESSOA,
            'DS_PEDIDO' => $request->DS_PEDIDO,
            'ST_PEDIDO' => 'A',
            'DT_PEDIDO' => carbon::now()
        ]);
        $arraytags = explode(',',$request->DS_PEDIDO_TAG);
        foreach($arraytags as $tag){
            $orderTag = OrderTag::create([
                'COD_PEDIDO' => $order->COD_PEDIDO,
                'DS_PEDIDO_TAG' => $tag
            ]);
        }

        foreach ($request->file('files') as  $files) {
            Document::create([
                'COD_TIPO_DOCUMENTO'    => 1,
                'NOME_DOCUMENTO'        => $files->getClientOriginalName(),
                'DS_CAMINHO_DOCUMENTO'  => $files->store('orders'),
                'DT_CADASTRO'           => Carbon::now(),
                'NOME_EXTENSAO'         => $files->getClientOriginalExtension(),
                'DS_MIME_TYPE'          => $files->getClientMimeType()
            ]);
        }

        Notification::route('mail', config('mail.from.address'))
            ->notify(new NewOrder($order, $orderTag));

        toastr()->success('', 'Pedido Cadastrado');

        return redirect()->route('site.order.search');
    }

    public function search(){
         $orders = Order::when(request('situacao'), function ($query, $situacao){

             return $query->where('ST_PEDIDO', 'like', "%{$situacao}%");
         })->when(request('pedido'), function ($query, $pedido){

             return $query->where('COD_PEDIDO', 'like', "%{$pedido}%");
             })->when(request('periodoDe') || request('periodoAte'), function ($query) {

             return $query->whereBetween('DT_PEDIDO', [request('periodoDe'), request('periodoAte') ?? carbon::now()]);
         })->when(request('tag'), function ($query){

             return $query->wherehas('tag', function ($query){
             return $query->where('DS_PEDIDO_TAG', 'like', "%".request('tag')."%")->where([
                 ['COD_PESSOA','=', session('COD_PESSOA')],
                 ['ST_PEDIDO', '!=' , 'I']
             ])->orderBy('COD_PEDIDO', 'ASC');
             })->paginate(10);
         },
         function ($query) {
            return $query->where([
                ['COD_PESSOA','=', session('COD_PESSOA')],
                ['ST_PEDIDO', '!=' , 'I']
            ])->orderBy('COD_PEDIDO', 'ASC');
        })->paginate(10);

        return view('site.order.index',compact('orders'));
    }

    public function softDelete(Request $request){

        Order::where('COD_PEDIDO', $request->id)->update(['ST_PEDIDO' => 'I']);
        toastr()->success('', 'Pedido deletado com sucesso.');
        return Redirect::back();
    }


}
