@extends('layouts.app')

@section('content')
    <div class="editor-container">
        <h1>Editar Música</h1>
        <form action="{{ route('musicas.update', [$instrumento->id, $musica->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" value="{{ old('titulo', $musica->titulo) }}" class="input-title" required>
            </div>

            <div class="form-group">
                <label for="letra">Letra:</label>
                <textarea name="letra" class="input-letra" rows="20" required>{{ old('letra', $musica->letra) }}</textarea>
            </div>

            <div class="form-group">
                <label for="imagens">Imagens (Acordes):</label>
                <input type="file" name="imagens[]" multiple class="input-imagens">
            </div>

            <div class="button-group">
                <button type="submit" class="btn-submit">Salvar</button>
            </div>
        </form>

        @if($musica->imagens && is_array(json_decode($musica->imagens)))
            <div class="existing-images">
                <label>Imagens Existentes:</label>
                @foreach(json_decode($musica->imagens) as $imagem)
                    <img src="{{ asset('storage/' . $imagem) }}" alt="Acorde" class="existing-image">
                @endforeach
            </div>
        @else
            <p>Sem imagens existentes</p>
        @endif
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

    .editor-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    h1 {
        text-align: center;
        font-size: 2em;
        margin-bottom: 20px;
        color: #333;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        font-size: 1.2em;
        color: #555;
        display: block;
        margin-bottom: 10px;
    }

    .input-title, .input-letra {
        width: 100%;
        padding: 10px;
        font-size: 1.2em;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-bottom: 20px;
    }

    .input-title {
        font-size: 1.5em;
    }

    .input-letra {
        height: 500px; /* Tamanho aumentado */
        resize: vertical;
        background-color: #f9f9f9;
    }

    .input-imagens {
        margin-top: 15px;
        font-size: 1em;
    }

    .button-group {
        text-align: center;
    }

    .btn-submit {
        padding: 10px 20px;
        background-color: #007BFF;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 1.2em;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #0056b3;
    }

    .existing-images {
        margin-top: 30px;
        text-align: center;
    }

    .existing-image {
        width: 80px;
        height: auto;
        margin: 5px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    @media (max-width: 768px) {
        .editor-container {
            padding: 10px;
        }

        h1 {
            font-size: 1.5em;
        }

        .input-title, .input-letra {
            font-size: 1.1em;
        }

        .btn-submit {
            font-size: 1em;
        }
    }
</style>
@endsection

