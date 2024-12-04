@extends('layouts.default')

@section('content')
    <div class="container">
        <h1 class="text-center mb-4">Denominação Chassis</h1>

        <!-- Tabela de denominação de chassis -->
        <div style="overflow-x: auto;">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Código Chassi</th>
                        <th scope="col">Comprimento</th>
                        <th scope="col">Largura</th>
                        <th scope="col">Entre Longarinas</th>
                        <th scope="col">Frontal Centro Eixo</th>
                        <th scope="col">Tração Truck</th>
                        <th scope="col">Frontal 4 Eixo</th>
                        <th scope="col">Observação</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($denominacaoChassis as $chassi)
                        <tr>
                            <td>{{ $chassi->ID }}</td>
                            <td>{{ $chassi->codigo_chassi }}</td>
                            <td>{{ $chassi->comprimento }}</td>
                            <td>{{ $chassi->largura }}</td>
                            <td>{{ $chassi->entre_longarinas }}</td>
                            <td>{{ $chassi->frontal_centro_eixo }}</td>
                            <td>{{ $chassi->tracao_truck }}</td>
                            <td>{{ $chassi->frontal_4_eixo }}</td>
                            <td>{{ $chassi->obs }}</td>
                            <td>{{ $chassi->tipo }}</td>
                            <td>
                                <!-- Ação, como editar ou deletar -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Navegação de paginação -->
        <div class="d-flex justify-content-center">
            {{ $denominacaoChassis->links() }}
        </div>
    </div>
@endsection
