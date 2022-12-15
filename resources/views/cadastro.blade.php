@extends('layouts.layout')

@section('title', 'cadastro')

@section('content')
    <div class="container-fluid d-flex flex-column justify-content-center align-items-center" style="height:100vh">
        <h1>Cadastrar Produto</h1>
        <div class="container mt-4" style="width: 600px;">
            <form action="{{ route('cadastroStore') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nome do produto</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="nome" placeholder="Nome">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Tipo do produto</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="tipo" placeholder="Tipo">
            </div>
            <div class="mb-3">
                <label class="form-label" for="exampleCheck1">Valor do produto</label>
                <input type="text" class="form-control" id="exampleCheck1" name="valor" placeholder="Valor">
            </div>
            <input type="submit" name="Submit" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection