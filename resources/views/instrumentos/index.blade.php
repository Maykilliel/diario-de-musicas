@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content-box">
            <h1>Instrumentos</h1>
            <a href="{{ route('instrumentos.create') }}" class="btn btn-primary">Adicionar Novo Instrumento</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Instrumento</th>
                        <th>Data de Cadastro</th>
                        <th>Descrição</th>
                        <th>Estilo Musical</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($instrumentos as $instrumento)
                        <tr>
                            <td>{{ $instrumento->id }}</td>
                            <td>{{ $instrumento->instrumento }}</td>
                            <td>{{ $instrumento->data_cadastramento }}</td>
                            <td>{{ $instrumento->descricao }}</td>
                            <td>{{ $instrumento->estiloMusical->estilo_musical }}</td>
                            <td>
                                <a href="{{ route('instrumentos.show', $instrumento->id) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('instrumentos.edit', $instrumento->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('instrumentos.destroy', $instrumento->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        body {
            background-color: #e9f5ff; /* Fundo azul claro */
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Altura total da tela */
        }

        .content-box {
            background-color: #fff; /* Fundo branco */
            padding: 20px;
            border-radius: 10px; /* Bordas arredondadas */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra */
            width: 100%;
            max-width: 1000px; /* Largura máxima para a tabela */
        }

        h1 {
            color: #333; /* Cor do título */
            margin-bottom: 20px;
            text-align: center;
        }

        .btn {
            padding: 10px 15px;
            font-size: 14px;
            font-weight: bold;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            margin-right: 5px;
            border: none;
        }

        .btn-primary {
            background-color: #007bff; /* Cor do botão principal */
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-info {
            background-color: #17a2b8;
            color: #fff;
        }

        .btn-info:hover {
            background-color: #117a8b;
        }

        .btn-warning {
            background-color: #ffc107;
            color: #212529;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f8f9fa;
            color: #333;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }
    </style>
@endsection
