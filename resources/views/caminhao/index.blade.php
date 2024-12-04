@extends('layouts.default')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Lista de Caminhões</h1>

        <!-- Barra de busca -->
        <form action="{{ route('caminhao.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar por caminhão" value="{{ old('search', $search) }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                </div>
            </div>
        </form>

        <!-- Link para adicionar um novo caminhão -->
        <div class="mb-4 text-right">
            <a href="{{ route('caminhao.create') }}" class="bg-indigo-500 text-white px-4 py-2 mt-2 inline-block">Adicionar Caminhão</a>
        </div>

        <!-- Tabela de caminhões -->
        <div style="overflow-x: auto;">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Caminhão</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($caminhoes as $caminhao)
                        <tr>
                            <td>{{ $caminhao->ID }}</td>
                            <td>{{ $caminhao->Caminhao }}</td>
                            <td>
                                <!-- Link para Editar -->
                                <a href="{{ route('caminhao.edit', $caminhao->ID) }}" class="bg-yellow-500 text-white px-4 py-2 mt-2 inline-block">Editar</a>

                                <!-- Formulário para deletar o caminhão -->
                                <form action="{{ route('caminhao.destroy', $caminhao->ID) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 mt-2 inline-block" onclick="return confirm('Tem certeza que deseja excluir?')">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Navegação de paginação -->
        <div class="d-flex justify-content-center">
            {{ $caminhoes->appends(['search' => $search])->links() }}
        </div>
    </div>
@endsection
