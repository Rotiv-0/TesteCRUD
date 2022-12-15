<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index(){

        $products = Product::all();
        $categories = Category::all();
        
        return view('welcome', ['products'=>$products, 'categories'=>$categories]);
    }

    public function create() {
        $categories = Category::all();
        return view('cadastro', ['categories'=>$categories]);
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
        $categories = Category::all();
        $products = Product::where('category_id', '=', $request->category_id)->get();
        //dd($request);
        return view('welcome', ['products'=>$products, 'categories'=>$categories]);
    }
}
  
