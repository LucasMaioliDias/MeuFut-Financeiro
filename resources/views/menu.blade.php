<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu-Financeiro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            background-image: url('https://img.freepik.com/vetores-gratis/padrao-sem-costura-empresarial_1284-4862.jpg?w=740&t=st=1700073847~exp=1700074447~hmac=554e163d1f35ca47b236c7dce3162c6cbaa67bb88438e1dfcf65567b2876bdaf');
            background-repeat: repeat-x;
            height: 80px;
            border-bottom: 2px solid #888;
            padding: 0 40px;
        }

        .header h1,
        .header a {
            margin: 0;   
        }

        .borda {
            display: flex;
            background-color: #fff;
            padding: 0 10px;
            border-radius: 10px;
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
        }

        .quadrado {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            
            border: 2px solid #888;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
            padding: 20px 30px; 
        }

        .verde {
            border-color: #28a745;
            background-color: #d4edda;
            color: #28a745;
        }

        .vermelho {
            border-color: #dc3545;
            background-color: #f8d7da;
            color: #dc3545;
        }

        .preto {
            border-color: #000;
            background-color: ##00000080;
            color: #000;
        }
        .quadrado p, .quadrado h2 {
            margin: 0;
        }

        .container2 {
            display: flex;
            border-bottom: 1px solid #888;
            border-top: 1px solid #888;
            margin-top: 30px;
            padding: 20px;
            justify-content: center;
        }
        .container2 input {
            margin-right: 8px;
            padding:  0 20px;
        }
        
        .container2 button {
                font-family: "Roboto", sans-serif;
                text-transform: uppercase;
                outline: 0;
                background: #87CEEB;
                border: 0;
                padding: 15px;
                color: #FFFFFF;
                font-size: 14px;
                cursor: pointer;
                border-radius: 7px;
            }

            .container2 button:hover,
            .container2 button:active,
            .container2 button:focus {
                background: #4800f1;
            }
        
    </style>
</head>
<body>
    <div class="header">
        <div class="borda">
            <h1>Financeiro Pessoal</h1>
        </div>
        <div class="borda">
            <a href="#">Sair</a>
        </div>
    </div>
    <div class='container'>
        <div class='quadrado verde'>
            <p>Lucro</p>
            <h2>R$ {{ number_format(Session::get('lucro', 0), 2, ',', '.') }}</h2>
        </div>
        <div class='quadrado vermelho'>
    <p>Gastos</p>
    <h2>R$ {{ number_format(Session::get('despesas', 0), 2, ',', '.') }}</h2>
</div>
        <div class='quadrado preto'>
    <p>Saldo</p>
    <h2>R$ {{ number_format(Session::get('saldo', 0), 2, ',', '.') }}</h2>
</div>
    </div>
    <div class="container2">
    <form action="{{ route('finance') }}" method="POST">
        @csrf
        <input type="text" placeholder="Ex. Energia" id="tipo" name="tipo">
        <input type="number" placeholder="Valor" id="valor" name="valor">
        <button type="submit" name="registrar">Registrar</button>
    </form>
</div>
</body>
</html>