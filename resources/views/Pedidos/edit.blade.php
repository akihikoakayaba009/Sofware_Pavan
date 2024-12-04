@extends('layouts.form')

@section('content')
    <h1>Editar Pedido</h1>

    <form action="{{ route('pedidos.update', $pedido->ID) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="N_Serie">Número de Série</label>
            <input type="text" name="N_Serie" id="N_Serie" class="form-control" value="{{ $pedido->N_Serie }}" required>
        </div>

        <!-- Restante dos campos como no formulário de criar -->

        <!-- Select Cliente -->
        <div class="form-group">
            <label for="ID_Cliente">Cliente</label>
            <select name="ID_Cliente" id="ID_Cliente" class="form-control" required>
                <option value="">Selecione um Cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->ID }}" {{ $pedido->ID_Cliente == $cliente->ID ? 'selected' : '' }}>{{ $cliente->nome }}</option>
                @endforeach
            </select>
        </div>

        <!-- Select Caminhão -->
        <div class="form-group">
            <label for="ID_Caminhao">Caminhão</label>
            <select name="ID_Caminhao" id="ID_Caminhao" class="form-control" required>
                <option value="">Selecione um Caminhão</option>
                @foreach($caminhoes as $caminhao)
                    <option value="{{ $caminhao->ID }}" {{ $pedido->ID_Caminhao == $caminhao->ID ? 'selected' : '' }}>{{ $caminhao->Caminhao }}</option>
                @endforeach
            </select>
        </div>

        <!-- Restante dos campos, e botões para salvar -->
        <button type="submit" class="btn btn-warning">Atualizar Pedido</button>
    </form>
@endsection
