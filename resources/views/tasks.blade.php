<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{asset('css/tasks.css')}}">
    <title>Tasks</title>
</head>

<body>
<nav>{{$user->name}}</nav>
<h1>Minhas Tarefas</h1>
@foreach($user->tasks as $task)
    <form action="{{route('deleteTask', ['user'=>$user->id ,'task_id' => $task->id])}}" method="post">
        @csrf
        @method('delete')
        <ul>
            <li>{{$task['title']}}: {{$task['task']}}
                <input class="submit" type="submit" value="Deletar">
            </li>
        </ul>
    </form>
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
