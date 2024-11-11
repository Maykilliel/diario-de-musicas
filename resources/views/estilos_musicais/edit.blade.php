@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content-box">
            <h1>Editar Estilo Musical</h1>
            <form action="{{ route('estilos-musicais.update', $estiloMusical->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="estilo_musical">Estilo Musical:</label>
                    <input type="text" id="estilo_musical" name="estilo_musical" class="form-control" value="{{ old('estilo_musical', $estiloMusical->estilo_musical) }}" required>
                </div>
                <div class="btn-group">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="{{ route('estilos-musicais.index') }}" class="btn btn-secondary">Voltar para a Lista</a>
                </div>
            </form>
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
            max-width: 600px; /* Largura máxima */
        }

        h1 {
            color: #333; /* Cor do título */
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border-radius: 5px; /* Bordas arredondadas */
            border: 1px solid #ccc; /* Borda */
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
            border-radius: 5px; /* Bordas arredondadas */
            text-decoration: none;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff; /* Cor do botão de salvar */
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Cor ao passar o mouse */
        }

        .btn-secondary {
            background-color: #6c757d; /* Cor do botão de voltar */
            color: #fff;
        }

        .btn-secondary:hover {
            background-color: #5a6268; /* Cor ao passar o mouse */
        }
    </style>
@endsection
