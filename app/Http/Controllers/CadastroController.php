<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CadastroController extends Controller
{
    public function create() {

        return view('cadastro');
    }

    public function store(Request $request){
       
        //Product::create($request->all());
        dd($request);
        //return redirect()->route('index-Create');
    }
}
