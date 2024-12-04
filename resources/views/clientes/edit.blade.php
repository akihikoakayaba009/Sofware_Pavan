@extends('layouts.form')

@section('content')
<div class="container">
    <h3 class="text-center">Editar Cliente</h3>

    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ $cliente->nome }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
