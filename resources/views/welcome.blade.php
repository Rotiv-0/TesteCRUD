@extends('layouts.layout')

@section('title', 'Home')

@section('content')
    <div class="container-fluid flex-column d-flex justify-content-center align-items-center" style="height: 100vh">
        <div class="row" style="width: 100%;">
            <div class="col-6">
                <div class="d-flex justify-content-center" style="width: 100%;">
                    <h1>Produtos</h1>
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex align-items-center" style="width: 100%; height: 100%;">   
                    <form action="{{ route('cadastroFilter') }}" class="d-flex" method="GET">
                        @csrf
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Todos os itens</option>
                            <option value="1">vestuário</option>
                            <option value="2">Copos, xícaras e canecas</option>
                            <option value="3">Papelaria</option>
                        </select>
                        <input type="submit" class="btn btn-primary" value="Filtrar" style="font-size: 12px; margin-left: 16px; ">
                    </form>
                </div>     
            </div>
        </div>
        <div class="container mt-4">
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
                    <a href="{{ route('cadastroEdit', ['id'=> $product->id]) }}" class="btn btn-primary" style="font-size: 12px; margin-right: 6px;">Edit</a>
                
                    <form action="{{ route('cadastroDestroy', ['id'=> $product->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="font-size: 12px;"> Del </button>
                    </form> 
                </div>   
                </th>
                </tr>
               @endforeach
            </tbody>
            </table>
        </div>
        <div class="container d-flex justify-content-center">
            <a href="{{ route('cadastroCreate') }}" class="btn btn-primary">Cadastrar novo produto</a>
            <a href="{{ route('cadastroLixeira') }}" class="btn btn-danger" style="margin-left: 8px;">Ir para a lixeira</a>
        </div>
    </div>
@endsection
