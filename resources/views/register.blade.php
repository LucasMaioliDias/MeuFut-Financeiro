<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <Style>
        @import url(https://fonts.googleapis.com/css?family=Roboto:300);

        .login-page {
            width: 360px;
            padding: 8% 0 0;
            margin: auto;
        }

        .form {
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            max-width: 360px;
            margin: 0 auto 100px;
            padding: 45px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }

        .form input {
            font-family: "Roboto", sans-serif;
            outline: 0;
            background: #fff;
            width: 100%;
            border: 1px solid #888888;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
            border-radius: 10px;
        }

        .form button {
            font-family: "Roboto", sans-serif;
            text-transform: uppercase;
            outline: 0;
            background: #87CEEB;
            width: 100%;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            cursor: pointer;
            border-radius: 7px;
        }

        .form button:hover,
        .form button:active,
        .form button:focus {
            background: #4800f1;
        }

        .form .message {
            margin: 15px 0 0;
            color: #b3b3b3;
            font-size: 12px;
        }

        .form .message a {
            color: #87CEEB;
            text-decoration: none;
        }

        body {
            background-image: url('https://img.freepik.com/vetores-gratis/padrao-sem-costura-empresarial_1284-4862.jpg?w=740&t=st=1700073847~exp=1700074447~hmac=554e163d1f35ca47b236c7dce3162c6cbaa67bb88438e1dfcf65567b2876bdaf');
            background-repeat: repeat;

        }

        h1 {
            font-family: "Roboto", sans-serif;

        }

        .tex {
            display: flex;
            justify-content: center;
            font-weight: 900;
            

        }

        .titulo {
            display: flex;
            justify-content: space-between;
            color: #87CEEB;
        }

        .alert {
            font-family: "Roboto", sans-serif;
            color: red;
            font-size: small;
            margin-bottom: 8px;
            position: relative;
            top: -10px;

        }
    </Style>
</head>

<body>
    <div class="login-page">
        <div class="form">
            <div class="titulo">
                <h1 class="">Criar Cadastro</h1>
            </div>
            <form class="cadastro-form" method="POST" action="{{ route('post.register') }}">
                <input type="text" id="name" name="name" placeholder="Nome" required autofocus class="@error('name') is-invalid @enderror">
                @csrf
                @error('name')
                <div class="alert">{{ $message }}</div>
                @enderror
                <input type="email" id="email" name="email" placeholder="Email" required class="@error('email') is-invalid @enderror">
                @error('email')
                <div class="alert">{{ $message }}</div>
                @enderror
                <input type="password" id="password" name="password" placeholder="Senha" required class="@error('password') is-invalid @enderror">
                @error('password')
                <div class="alert">{{ $message }}</div>
                @enderror
                <input type="password" id="password-confirm" name="password_confirmation" placeholder="Confirmar Senha" required class="@error('password_confirmation') is-invalid @enderror">
                @error('password_confirmation')
                <div class="alert">{{ $message }}</div>
                @enderror
                <button>Criar</button>
                <p class="message">Já tem cadastro? <a href="/login">Entrar</a></p>
            </form>
        </div>
    </div>
    <div class="tex">
        <p>By MeuFut</p>
    </div>
</body>

</html>