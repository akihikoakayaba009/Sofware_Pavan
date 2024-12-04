@extends('layouts.form')

@section('content')
    <h1>Adicionar Novo Pedido</h1>

    <form action="{{ route('pedidos.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="N_Serie">Número de Série</label>
            <input type="text" name="N_Serie" id="N_Serie" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="Comprimento">Comprimento</label>
            <input type="number" name="Comprimento" id="Comprimento" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="Largura">Largura</label>
            <input type="number" name="Largura" id="Largura" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="Altura">Altura</label>
            <input type="number" name="Altura" id="Altura" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="Assoalho">Assoalho</label>
            <textarea name="Assoalho" id="Assoalho" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="Porta_T">Porta T</label>
            <input type="number" name="Porta_T" id="Porta_T" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="Porta_LD">Porta LD</label>
            <input type="number" name="Porta_LD" id="Porta_LD" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="Porta_LE">Porta LE</label>
            <input type="number" name="Porta_LE" id="Porta_LE" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="Modelo">Modelo</label>
            <input type="number" name="Modelo" id="Modelo" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="Material">Material</label>
            <input type="number" name="Material" id="Material" class="form-control" required>
        </div>

       <!-- Select Cliente -->
<div class="form-group">
    <label for="ID_Cliente">Cliente</label>
    <select name="ID_Cliente" id="ID_Cliente" class="form-control" required>
        <option value="">Selecione um Cliente</option>
        @foreach($clientes as $cliente)
            <option value="{{ $cliente->ID }}">{{ $cliente->nome }}</option>
        @endforeach
    </select>
</div>

<!-- Select Caminhão -->
<div class="form-group">
    <label for="ID_Caminhao">Caminhão</label>
    <select name="ID_Caminhao" id="ID_Caminhao" class="form-control" required>
        <option value="">Selecione um Caminhão</option>
        @foreach($caminhoes as $caminhao)
            <option value="{{ $caminhao->ID }}">{{ $caminhao->Caminhao }}</option>
        @endforeach
    </select>
</div>

<!-- Select Transporte -->
<div class="form-group">
    <label for="ID_Transporte">Transporte</label>
    <select name="ID_Transporte" id="ID_Transporte" class="form-control" required>
        <option value="">Selecione um Transporte</option>
        @foreach($transportes as $transporte)
        <option value="{{ $transporte->ID_Transporte }}">{{ $transporte->Tipo }}</option>

        @endforeach
    </select>
</div>

<!-- Select Destino -->
<div class="form-group">
    <label for="ID_Destino">Destino</label>
    <select name="ID_Destino" id="ID_Destino" class="form-control" required>
        <option value="">Selecione um Destino</option>
        @foreach($destinos as $destino)
            <option value="{{ $destino->ID }}">{{ $destino->Estado }}</option>
        @endforeach
    </select>
</div>

<!-- Select Projetista -->
<div class="form-group">
    <label for="ID_Projetista">Projetista</label>
    <select name="ID_Projetista" id="ID_Projetista" class="form-control" required>
        <option value="">Selecione um Projetista</option>
        @foreach($projetistas as $projetista)
            <option value="{{ $projetista->ID }}">{{ $projetista->nome }}</option>
        @endforeach
    </select>
</div>


       
        <div class="form-group">
            <label for="data_pedido">Data do Pedido</label>
            <input type="datetime-local" name="data_pedido" id="data_pedido" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar Pedido</button>
    </form>
@endsection
