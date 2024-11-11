@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content-box">
            <h1>Detalhes do Estilo Musical</h1>
            <p><strong>ID:</strong> {{ $estiloMusical->id }}</p>
            <p><strong>Estilo Musical:</strong> {{ $estiloMusical->estilo_musical }}</p>
            
            <div class="btn-group">
                <a href="{{ route('estilos-musicais.edit', $estiloMusical->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('estilos-musicais.destroy', $estiloMusical->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>
                <a href="{{ route('estilos-musicais.index') }}" class="btn btn-primary">Voltar para a Lista</a>
            </div>
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
            max-width: 600px;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        p {
            font-size: 16px;
            color: #333;
            margin-bottom: 10px;
        }

        .btn-group {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .btn {
            padding: 10px 15px;
            font-size: 14px;
            font-weight: bold;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            text-align: center;
        }

        .btn-warning {
            background-color: #ffc107;
            color: #212529;
        }

        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
@endsection
