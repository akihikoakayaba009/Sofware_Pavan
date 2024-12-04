@extends('layouts.app')

@section('content')
    <h1>Editar Caminhão</h1>

    <form action="{{ route('caminhao.update', $caminhao->ID) }}" method="POST">
        @csrf
        @method('PUT') <!-- Método PUT para atualização -->
        
        <div class="form-group">
            <label for="Caminhao">Nome do Caminhão</label>
            <input type="text" name="Caminhao" class="form-control" id="Caminhao" value="{{ old('Caminhao', $caminhao->Caminhao) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Caminhão</button>
    </form>
@endsection
