@extends('layouts.app')

@section('content')
    <div class="editor-container">
        <h1>Adicionar Nova Música para {{ $instrumento->instrumento }}</h1>
        <form action="{{ route('musicas.store', $instrumento->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" name="titulo" class="input-title" required>
            </div>

            <div class="form-group">
                <label for="letra">Letra:</label>
                <textarea name="letra" class="input-letra" rows="20" required></textarea>
            </div>

            <div class="form-group">
                <label for="imagens">Imagens dos Acordes:</label>
                <input type="file" id="imagens" name="imagens[]" multiple class="input-imagens">
            </div>

            <div class="button-group">
                <button type="submit" class="btn-submit">Salvar</button>
            </div>
        </form>
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

.input-title {
    width: 100%;
    padding: 10px;
    font-size: 1.5em;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-bottom: 20px;
}

.input-letra {
    width: 100%;
    height: 500px; /* Aumenta o tamanho da caixa de texto */
    padding: 15px;
    font-size: 1.2em;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
    line-height: 1.5;
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
}

.existing-images img {
    width: 80px;
    height: auto;
    margin: 5px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

/* Responsivo */
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