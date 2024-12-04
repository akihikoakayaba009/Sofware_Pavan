@extends('layouts.default')

@section('content')
    <h1>Lista de Pedidos</h1>

    <!-- Barra de pesquisa -->
    <form action="{{ route('pedidos.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar por número de série" value="{{ old('search', $search) }}">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Buscar</button>
            </div>
        </div>
    </form>

    <!-- Botão para adicionar novo pedido -->
    <a href="{{ route('pedidos.create') }}" class="btn btn-success mb-4">Adicionar Pedido</a>

    <!-- Tabela de pedidos -->
    <table class="table mt-3">
        <thead>
            <tr>
              
                <th>Nº Série</th>
                <th>Cliente</th>
                <th>comprimento(mm)</th>
                <th>Largura(mm)</th>
                <th>Altura(mm)</th>
                <th>Assoalho</th>
                <th>PortaT</th>
                <th>PortaLT</th>
                <th>PortaLE</th>
                <th>Modelo</th>
                <th>Material</th>
                <th>Base</th>
                <th>Transporte</th>
                <th>Destino</th>
                <th>Projetista</th>
                <th>Revisor</th>
                <th>Data do Pedido</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedidos as $pedido)
                <tr>
                  
                    <td>{{ $pedido->N_Serie }}</td>
                    <td>{{ $pedido->cliente->nome }}</td>
                    <td>{{ $pedido->Comprimento }}</td>
                    <td>{{ $pedido->Largura }}</td>
                    <td>{{ $pedido->Altura }}</td>
                    <td>{{ $pedido->Assoalho }}</td>
                    <td>{{ $pedido->Porta_T }}</td>
                    <td>{{ $pedido->Porta_LD }}</td>
                    <td>{{ $pedido->Porta_LE }}</td>
                    <td>{{ $pedido->Modelo }}</td>
                    <td>{{ $pedido->Material }}</td>
                    <td>{{ $pedido->Base }}</td>
                    <td>{{ $pedido->transporte->Tipo }}</td>
                    <td>{{ $pedido->destino->Estado }}</td>
                    <td>{{ $pedido->projetista->nome }}</td>
                    <td>{{ $pedido->revisor->Nome }}</td>
                    <td>{{ \Carbon\Carbon::parse($pedido->data_pedido)->format('d/m/Y') }}</td>

                    <td>
                        
                        <a href="{{ route('pedidos.edit', $pedido->ID) }}" class="btn btn-warning">Editar</a>

                        <form action="{{ route('pedidos.destroy', $pedido->ID) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">Deletar</button>
                             @if($pedido->arquivo_url)
                            <a href="{{ $pedido->arquivo_url }}" target="_blank" class="btn btn-info">Imprimir</a>
                        @else
                            <span class="btn btn-secondary">Sem arquivo</span>
                        @endif
                        </form>
                  
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Paginação -->
    <div class="d-flex justify-content-center">
        {{ $pedidos->links() }}
    </div>
@endsection
