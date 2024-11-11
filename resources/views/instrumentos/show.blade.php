@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content-box">
            <h1>Detalhes do Instrumento</h1>

            @if ($instrumento->imagem)
                <div class="image-container">
                    <img src="{{ asset('storage/' . $instrumento->imagem) }}" alt="Imagem do Instrumento" class="instrument-image">
                </div>
            @else
                <p>Sem imagem disponível</p>
            @endif

            <p><strong>ID:</strong> {{ $instrumento->id }}</p>
            <p><strong>Instrumento:</strong> {{ $instrumento->instrumento }}</p>
            <p><strong>Data de Cadastro:</strong> {{ $instrumento->data_cadastramento }}</p>
            <p><strong>Descrição:</strong> {{ $instrumento->descricao }}</p>
            <p><strong>Estilo Musical:</strong> {{ $instrumento->estiloMusical->estilo_musical }}</p>

            <div class="button-group">
                <a href="{{ route('instrumentos.edit', $instrumento->id) }}" class="btn btn-warning">Editar</a>

                <form action="{{ route('instrumentos.destroy', $instrumento->id) }}" method="POST" style="display:inline;" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Excluir</button>
                </form>

                <a href="{{ route('musicas.index', $instrumento->id) }}" class="btn btn-primary">Músicas</a>
                <a href="{{ route('instrumentos.index') }}" class="btn btn-primary">Voltar para a Lista</a>
            </div>
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
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .image-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .instrument-image {
            width: 200px;
            border-radius: 10px; /* Bordas arredondadas da imagem */
        }

        p {
            color: #555;
            margin-bottom: 10px;
        }

        .button-group {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap; /* Adiciona flexibilidade para os botões se ajustarem */
        }

        .btn {
            padding: 10px 15px;
            font-size: 14px;
            font-weight: bold;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
            border: none;
            margin-right: 10px; /* Espaçamento entre os botões */
            margin-bottom: 10px; /* Espaçamento inferior para responsividade */
        }

        .btn:last-child {
            margin-right: 0; /* Remove o espaço após o último botão */
        }

        /* Estilo específico para o formulário de exclusão */
        .delete-form {
            display: inline;
            margin-right: 10px; /* Espaçamento entre o botão Excluir e Músicas */
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
    </style>
@endsection
