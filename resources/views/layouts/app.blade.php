<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema de Instrumentos')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('styles')
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #333; /* Tom de preto suave */
            padding: 10px;
        }

        .navbar-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            color: #fff; /* Nome do site branco */
            font-size: 1.5rem;
            text-decoration: none;
        }

        .navbar-brand:hover {
            text-decoration: underline;
        }

        .navbar-nav {
            display: flex;
            gap: 15px; /* Espaçamento entre os links */
        }

        .nav-link {
            color: #fff; /* Links brancos */
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 4px;
        }

        .nav-link:hover {
            background-color: #555; /* Cor de fundo ao passar o mouse */
        }

        .btn {
            background-color: #007bff; /* Cor de fundo do botão */
            color: #fff; /* Cor do texto do botão */
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3; /* Cor de fundo ao passar o mouse */
        }

        .btn-logout {
            background-color: #dc3545; /* Cor de fundo para logout */
        }

        .btn-logout:hover {
            background-color: #c82333; /* Cor de fundo ao passar o mouse */
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-container">
            <a href="{{ route('home') }}" class="navbar-brand">Sistema de Instrumentos</a>
            <div class="navbar-nav">
                <a href="{{ route('estilos-musicais.index') }}" class="nav-link">Estilos Musicais</a>
                <a href="{{ route('instrumentos.index') }}" class="nav-link">Instrumentos</a>
                @if (Auth::check())
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-logout">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn">Login</a>
                @endif
            </div>
        </div>
    </nav>
    <main class="container" style="margin-top: 20px;">
        @yield('content')
    </main>
</body>
</html>
