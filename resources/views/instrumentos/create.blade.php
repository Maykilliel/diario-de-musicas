@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content-box">
            <h1>Adicionar Novo Instrumento</h1>

            <form action="{{ route('instrumentos.store') }}" method="POST" enctype="multipart/form-data" class="form">
                @csrf

                <div class="form-group">
                    <label for="imagem">Imagem do Instrumento:</label>
                    <input type="file" name="imagem" class="form-control">
                </div>

                <div class="form-group">
                    <label for="instrumento">Instrumento:</label>
                    <input type="text" id="instrumento" name="instrumento" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="data_cadastramento">Data de Cadastro:</label>
                    <input type="date" id="data_cadastramento" name="data_cadastramento" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <textarea id="descricao" name="descricao" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="estilo_musical_id">Estilo Musical:</label>
                    <select id="estilo_musical_id" name="estilo_musical_id" class="form-control" required>
                        @foreach($estilosMusicais as $estilo)
                            <option value="{{ $estilo->id }}">{{ $estilo->estilo_musical }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>

            <a href="{{ route('instrumentos.index') }}" class="btn btn-secondary">Voltar para a Lista</a>
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
            min-height: 100vh;
        }

        .content-box {
            background-color: #fff; /* Fundo branco */
            padding: 20px;
            border-radius: 10px; /* Bordas arredondadas */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn {
            padding: 10px 15px;
            font-size: 14px;
            font-weight: bold;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            border: none;
            margin-top: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: #fff;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
@endsection
