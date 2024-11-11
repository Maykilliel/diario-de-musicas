@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content-box">
            <h1>Bem-vindo ao Sistema de Instrumentos</h1>
            <p>Este sistema permite gerenciar estilos musicais e instrumentos. Utilize a barra de navegação acima para acessar os recursos disponíveis.</p>
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
            padding: 30px;
            border-radius: 10px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            width: 100%;
            max-width: 800px; 
            text-align: center; 
        }

        h1 {
            color: #333; 
            margin-bottom: 20px;
        }

        p {
            color: #555; 
            font-size: 18px; 
            margin-bottom: 20px;
        }

        .content-box a {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }

        .content-box a:hover {
            background-color: #0056b3; 
        }
    </style>
@endsection
