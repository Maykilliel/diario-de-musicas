@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content-box">
            <h1>Músicas do Instrumento: {{ $instrumento->instrumento }}</h1>
            <a href="{{ route('musicas.create', $instrumento->id) }}" class="btn btn-primary">Adicionar Nova Música</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @if($musicas && $musicas->isEmpty())
                        <tr>
                            <td colspan="3">Nenhuma música encontrada.</td>
                        </tr>
                    @elseif($musicas)
                        @foreach($musicas as $musica)
                            <tr>
                                <td>{{ $musica->id }}</td>
                                <td>{{ $musica->titulo }}</td>
                                <td>
                                    <a href="{{ route('musicas.show', [$instrumento->id, $musica->id]) }}" class="btn btn-info btn-sm">Ver</a>
                                    <a href="{{ route('musicas.edit', [$instrumento->id, $musica->id]) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('musicas.destroy', [$instrumento->id, $musica->id]) }}" method="POST" style="display:inline;" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        body {
            background-color: #e9f5ff;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .content-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 800px; /* Aumentando o tamanho máximo */
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .table th {
            background-color: #f8f9fa;
            color: #333;
        }

        .table td {
            color: #555;
        }

        .table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            padding: 10px 15px;
            font-size: 14px;
            font-weight: bold;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            border: none;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .btn-sm {
            padding: 8px 12px;
            font-size: 12px;
        }

        .btn-info {
            background-color: #17a2b8;
            color: white;
        }

        .btn-info:hover {
            background-color: #138496;
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

        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Margem específica para o formulário de exclusão */
        .delete-form {
            display: inline;
            margin-right: 10px;
        }
    </style>
@endsection
