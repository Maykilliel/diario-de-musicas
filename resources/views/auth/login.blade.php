<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema de Instrumentos</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #e9f0f7; /* Azul claro para o fundo da página */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: #fff; /* Fundo branco para o formulário */
            padding: 30px;
            border-radius: 10px; /* Pontas arredondadas */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra para um efeito de elevação */
            max-width: 400px;
            width: 100%;
            box-sizing: border-box;
        }

        .login-container h2 {
            margin-top: 0;
            color: #333; /* Cor do texto do título */
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555; /* Cor do texto dos labels */
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px; /* Bordas arredondadas para os campos de entrada */
        }

        .form-group input:focus {
            border-color: #007bff; /* Cor da borda ao focar */
            outline: none;
        }

        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #007bff; /* Cor de fundo do botão */
            color: #fff; /* Cor do texto do botão */
            border: none;
            border-radius: 5px; /* Bordas arredondadas para o botão */
            cursor: pointer;
            font-size: 16px;
        }

        .form-group button:hover {
            background-color: #0056b3; /* Cor de fundo ao passar o mouse */
        }

        .form-group a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #007bff; /* Cor do link */
            text-decoration: none;
        }

        .form-group a:hover {
            text-decoration: underline; /* Sublinha o link ao passar o mouse */
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit">Entrar</button>
            </div>
            <div class="form-group">
                <a href="{{ route('register') }}">Criar uma conta</a>
            </div>
        </form>
    </div>
</body>
</html>


