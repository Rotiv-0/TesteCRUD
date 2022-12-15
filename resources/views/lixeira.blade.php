@extends('layouts.layout')

@section('title', 'lixeira')

@section('content')
    <div class="container-fluid flex-column d-flex justify-content-center align-items-center" style="height: 100vh">
        <h1>Lixeira</h1>
        <div class="container d-flex flex-column jusfify-content-center align-items-center">
            <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Tipo</th>
                <th scope="col">Valor</th>
                <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
               @foreach($products as $product) 
                <tr>
                <th>{{ $product->id }}</th>
                <td>{{ $product->nome }}</td>
                <td>{{ $product->tipo }}</td>
                <td>{{ $product->valor }}</td>
                <th> 
                <div class="container d-flex" style="">   
                    <a href="{{ route('cadastroRestore', ['id'=> $product->id]) }}" class="btn btn-success" style="font-size: 12px; margin-right: 6px;">Restore</a>
                    <a href="{{ route('cadastroErase', ['id'=> $product->id]) }}" class="btn btn-danger" style="font-size: 12px;">Erase</a>
                </div>   
                </th>
                </tr>
               @endforeach
            </tbody>
            </table>
            <div class="container justify-content-center">
                <a href="{{ route('index-Create') }}" class="btn btn-primary">Voltar para Produtos</a>
            </div>
        </div>
        
    </div>
@endsection
