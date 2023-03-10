<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/newUser.css')}}">
    <title>Criar novo usuário</title>
</head>
    <body>
    <h1>Cadastrar usuário</h1>
        <form action="{{route('user.store')}}" method="post">
            @csrf
            <div>
                NOME: <input type="text" name="name" placeholder="Nome">
            </div>
            <br>
            <div>
                EMAIL: <input type="email" name="email" placeholder="Email">
            </div>
            <br>
            <div>
                SENHA: <input type="password" name="password" placeholder="Senha">
            </div>
            <br>
            <div>
                <input type="submit" value="Cadastrar">
            </div>
        </form>
    </body>
</html>
