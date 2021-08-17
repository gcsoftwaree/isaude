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
use Illuminate\Support\Facades\Validator;

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
        ddd($request->all());
        $user = User::where('DS_LOGIN', $request->session()->get('DS_LOGIN'))->first();

        $order = Order::create([
            'COD_PESSOA' => $user->COD_PESSOA,
            'DS_PEDIDO' => $request->DS_PEDIDO,
            'ST_PEDIDO' => 'A',
            'DT_PEDIDO' => carbon::now()
        ]);

         $orderTag = OrderTag::create([
            'COD_PEDIDO' => $order->COD_PEDIDO,
            'DS_PEDIDO_TAG' => $request->DS_PEDIDO_TAG
        ]);
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

    function search(){
         $orders = Order::where('DS_PEDIDO', 'Like', '%' . request('term') . '%')->orderBy('COD_PEDIDO', 'DESC')->paginate(10);
         return view('site.order.index',['orders'=>$orders]);
    }
}
