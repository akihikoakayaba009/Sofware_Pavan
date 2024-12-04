@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Caminhão</h1>

    <form action="{{ route('caminhao.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="Caminhao">Caminhão</label>
            <textarea name="Caminhao" id="Caminhao" class="form-control" required>{{ old('Caminhao') }}</textarea>
            @error('Caminhao')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Salvar</button>
    </form>
</div>
@endsection
