<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class FrontController extends Controller
{
    //
    public function index(){
        return view('BootstrapWebpages.home');
    }
    
    public function lang($locale){
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
