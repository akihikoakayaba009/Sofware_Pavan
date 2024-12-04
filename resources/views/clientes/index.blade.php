@extends('layouts.default')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Clientes</h1>

        <!-- Barra de busca -->
        <form action="{{ route('clientes.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar por nome" value="{{ old('search', $search) }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                </div>
            </div>
        </form>

        <!-- Link para adicionar um novo cliente -->
        <div class="mb-4 text-right">
            <a href="{{ route('clientes.create') }}" class="bg-indigo-500 text-white px-4 py-2 mt-2 inline-block">Adicionar Cliente</a>
        </div>

        <!-- Tabela de clientes -->
        <div style="overflow-x: auto;">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->ID }}</td>
                            <td>{{ $cliente->nome }}</td>
                            <td>
                                <!-- Link para Editar -->
                                <a href="{{ route('clientes.edit', $cliente) }}" class="bg-yellow-500 text-white px-4 py-2 mt-2 inline-block">Editar</a>

                                <!-- Formulário para deletar o cliente -->
                                <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 mt-2 inline-block">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Navegação de paginação -->
        <div class="d-flex justify-content-center">
            {{ $clientes->appends(['search' => $search])->links() }}
        </div>
    </div>
@endsection
