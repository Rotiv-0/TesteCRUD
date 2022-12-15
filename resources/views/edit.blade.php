@extends('layouts.layout')

@section('title', 'edição')

@section('content')
    <div class="container-fluid d-flex flex-column justify-content-center align-items-center" style="height:100vh">
        <h1>Editar Produto</h1>
        <div class="container mt-4" style="width: 600px;">
            <form action="{{ route('cadastroUpdate', ['id'=>$products->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nome do produto</label>
                <input type="text" class="form-control" value="{{$products->nome}}" id="exampleInputEmail1" name="nome">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Tipo do produto</label>
                <input type="text" class="form-control" value="{{$products->tipo}}" id="exampleInputPassword1" name="tipo">
            </div>
            <div class="mb-3">
                <label class="form-label" for="exampleCheck1">Valor do produto</label>
                <input type="text" class="form-control" value="{{$products->valor}}" id="exampleCheck1" name="valor">
            </div>
            <input type="submit" name="Submit" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection