@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $musica->titulo }}</h1>
        <p>{!! nl2br(e($musica->letra)) !!}</p>

        @if ($musica->imagens)
            <h3>Imagens (Acordes):</h3>
            @foreach (json_decode($musica->imagens) as $imagem)
                <img src="{{ asset('storage/' . $imagem) }}" alt="Acorde">
            @endforeach
        @endif
    </div>
@endsection

@section('styles')
<style>
    /* Estilo geral para a página de detalhes da música */
body {
    background-color: #e9f5ff; /* Fundo azul claro */
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff; 
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    margin-top: 20px;
}

h1 {
    font-size: 2em;
    margin-bottom: 10px;
    color: #333;
    text-align: center;
}

p {
    color: #555;
    margin-bottom: 10px;
    white-space: pre-wrap; 
}

h3 {
    color: #333;
    margin-bottom: 10px;
}

img {
    display: inline-block;
    margin: 5px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

img {
    width: 150px; /* Tamanho fixo das imagens dos acordes */
    height: auto;
}

/* Responsivo */
@media (max-width: 768px) {
    .container {
        padding: 10px;
    }

    h1 {
        font-size: 1.5em;
    }

    img {
        width: 80px;
    }
}

</style>
@endsection