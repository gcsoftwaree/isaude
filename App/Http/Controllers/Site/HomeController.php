<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        if(!(Auth::check())){
            return redirect()->intended('/');
        }
        return view('site.home.index');
    }
}
