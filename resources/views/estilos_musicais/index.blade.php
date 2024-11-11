@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content-box">
            <h1>Estilos Musicais</h1>
            <a href="{{ route('estilos-musicais.create') }}" class="btn btn-primary">Adicionar Novo Estilo</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Estilo Musical</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($estilosMusicais as $estilo)
                        <tr>
                            <td>{{ $estilo->id }}</td>
                            <td>{{ $estilo->estilo_musical }}</td>
                            <td>
                                <a href="{{ route('estilos-musicais.show', $estilo->id) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('estilos-musicais.edit', $estilo->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('estilos-musicais.destroy', $estilo->id) }}" method="POST" style="display:inline;">
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
            background-color: #e9f5ff; /* Fundo da página azul claro */
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Ocupa a altura total da tela */
        }

        .content-box {
            background-color: #fff; /* Fundo branco para o conteúdo */
            padding: 20px;
            border-radius: 10px; /* Bordas arredondadas */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra para o conteúdo */
            width: 100%;
            max-width: 800px; /* Largura máxima do conteúdo */
        }

        h1 {
            color: #333; /* Cor do título */
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            border-radius: 5px; /* Bordas arredondadas para botões */
            text-decoration: none;
            cursor: pointer;
            margin-right: 5px;
            border: none;
        }

        .btn-primary {
            background-color: #007bff; /* Cor de fundo do botão primário */
            color: #fff; /* Cor do texto do botão primário */
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Cor de fundo ao passar o mouse */
        }

        .btn-info {
            background-color: #17a2b8; /* Cor de fundo do botão de informação */
            color: #fff; /* Cor do texto do botão de informação */
        }

        .btn-info:hover {
            background-color: #117a8b; /* Cor de fundo ao passar o mouse */
        }

        .btn-warning {
            background-color: #ffc107; /* Cor de fundo do botão de aviso */
            color: #212529; /* Cor do texto do botão de aviso */
        }

        .btn-warning:hover {
            background-color: #e0a800; /* Cor de fundo ao passar o mouse */
        }

        .btn-danger {
            background-color: #dc3545; /* Cor de fundo do botão de perigo */
            color: #fff; /* Cor do texto do botão de perigo */
        }

        .btn-danger:hover {
            background-color: #c82333; /* Cor de fundo ao passar o mouse */
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
            background-color: #f8f9fa; /* Cor de fundo dos cabeçalhos da tabela */
            color: #333; /* Cor do texto dos cabeçalhos da tabela */
        }

        table tr:hover {
            background-color: #f1f1f1; /* Cor de fundo ao passar o mouse sobre as linhas */
        }
    </style>
@endsection
