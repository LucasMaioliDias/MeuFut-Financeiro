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
            padding: 10px 20px;
            border-radius: 10px;
            align-items: center;
            justify-content: center;
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
            background-color: #00000080;
            color: #000;
        }

        .quadrado p,
        .quadrado h2 {
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
            padding: 0 20px;
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


        .container4 {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }

        .borda p {
            margin: 0;
            margin-right: 10px;
            font-style: italic;
        }


        .container3 {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        .planilha {
            display: flex;
            justify-content: space-between;
            border-top: 1px solid #ccc;
            padding: 10px 30px;
            width: 100%;
        }

        .container5 {
            display: flex;
            align-items: center;
        }

        .container5 h2,
        .container5 h3,
        .container5 p {
            margin: 0;
        }

        .container5 h3 {
            margin-right: 10px;
        }

        .container5 button {
            font-family: "Roboto", sans-serif;
            text-transform: uppercase;
            outline: 0;
            background: #87CEEB;
            border: 0;
            padding: 10px;
            color: #FFFFFF;
            font-size: 12px;
            cursor: pointer;
            border-radius: 5px;
        }

        .container5 button:hover,
        .container5 button:active,
        .container5 button:focus {
            background: #FF0000;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="borda">
            <h1>Financeiro Pessoal</h1>
        </div>
        <div class="borda">
            <p>Ola, {{auth()->user()->name}}</p>
            <a href="{{ route('logout') }}">Sair</a>
        </div>
    </div>
    <div class='container'>
        <div class='quadrado verde'>
            <p>Lucro</p>
            <h2>R$ {{$positive}}</h2>
        </div>
        <div class='quadrado vermelho'>
            <p>Gastos</p>
            <h2>R$ {{$negative}}</h2>
        </div>
        <div class='quadrado preto'>
            <p>Saldo</p>
            <h2>R$ {{$saldo}}</h2>
        </div>
    </div>
    <div class="container2">
        <form action="{{ route('store') }}" method="POST">
            @csrf
            <input type="text" placeholder="Ex. Energia" id="description" name="description">
            <input type="number" placeholder="Valor" id="value" name="value">
            <!--<input type="number" placeholder="Valor" id="type" name="type">!-->
            <select id="type" name="type">
                <option value="" disabled selected>Selecione uma opção</option>
                <option value="1">Positivo</option>
                <option value="2">Negativo</option>
            </select>
            <button type="submit" name="registrar">Registrar</button>
        </form>
    </div>
    <div class="container3">
        @foreach($finances as $finance)
        <div class="planilha">
            <div class="container5">
                <h2>{{ $finance->description }}</h2>
            </div>
            <div class="container5">
                <h3 class="{{ $finance->type == 1 ? 'verde' : 'vermelho' }}">
                    R$ {{ $finance->value }}
                </h3>
            </div>
            <div class="container5">
                <p>{{ \Carbon\Carbon::parse($finance->updated_at)->format('d/m/Y H:i:s') }}</p>
            </div>
            <div class="container5">
                <form action="{{ route('finance.destroy', ['financeId' => $finance->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Excluir</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</body>

</html>