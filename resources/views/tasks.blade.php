<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tasks</title>
    <style> body {background-color: #2d3748}
            h1{color: aquamarine}
            h2{color: aquamarine}
    </style>
</head>

<body>
    <h1>Minhas Tarefas</h1>
        @foreach($user->tasks as $task)
            <li style="color: aqua">{{$task['task']}}</li>
        @endforeach

    <h2>Cadastrar Tarefa</h2>
        <form action="{{route('newTask', [$user->id])}}" method="post">
            @csrf
            <input type="text" name="title" placeholder="Titulo"><br>
            <input type="text" name="task" placeholder="Descreva a tarefa" style="height: 100px;width: 500px"><br>
            <input type="submit" value="Salvar">
        </form>
</body>
</html>
