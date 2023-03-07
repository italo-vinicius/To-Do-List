<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body style="text-align: center">
    <h1>Entrar</h1>

    <form action="{{route('userAuth')}}" method="get">
        @csrf
        <div>
            EMAIL: <input type="email" name="email" placeholder="Email">
        </div>
        <br>
        <div>
            SENHA: <input type="password" name="password" placeholder="Senha">
        </div>
        <br>
        <div>
            <input type="submit" value="Entrar">
        </div>
    </form>

    <a href="{{route('user.create')}}">
         <input type="submit" value="Criar Novo Usuário">
    </a>
</body>
</html>
