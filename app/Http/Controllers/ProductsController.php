<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index(){

        $products = Product::all();
        
        return view('welcome', ['products'=>$products]);
    }

    public function create() {

        return view('cadastro');
    }

    public function store(Request $request){
       
        Product::create($request->all());
        
        return redirect()->route('index-Create');
    }

    public function edit($id){
        $products = Product::where('id', $id)->first();
        if(!empty($products)){
            return view('edit', ['products'=>$products]);
        }
        else {
            return redirect()->route('index-Create');
        }

        
    }

    public function update(Request $request, $id){

        $data = [
            'nome' => $request->nome,
            'tipo' => $request->tipo,
            'valor' => $request->valor,
        ];

        Product::where('id', $id)->update($data);
        return redirect()->route('index-Create');
    }

    public function destroy($id){

        Product::where('id', $id)->delete();
        return redirect()->route('index-Create');
    }

    public function archive(){
        
        $products = Product::onlyTrashed()->get();
        
        return view('lixeira', ['products'=>$products]);
    }

    public function restore($id){
        
        $products = Product::where('id', $id)->restore();
        return redirect()->route('index-Create');
    }

    public function erase($id){

        $productsErase = Product::where('id', $id)->forceDelete();
        $products = Product::onlyTrashed()->get();
        return view('lixeira', ['products'=>$products]);
    }

    public function filter(Request $request){
        
        $products = Product::where('tipo', '=', $request)->get();
        //dd($request);
        return view('welcome', ['products'=>$products]);
    }
}
  
