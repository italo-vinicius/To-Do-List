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
<nav class="navbar">{{$user->name}}</nav>

<div class="container">
    <h1 class="title">Minhas Tarefas</h1>

    @foreach($user->tasks as $task)
        <div class="task">
            <form action="{{route('deleteTask', ['user'=>$user->id ,'task_id' => $task->id])}}" method="post">
                @csrf
                @method('delete')
                <div class="task-details">
                    <span class="task-title">{{$task['title']}}:</span>
                    <span class="task-description">{{$task['task']}}</span>
                </div>
                <button class="delete-btn" type="submit">Deletar</button>
            </form>
        </div>
    @endforeach

    <div class="add-task">
        <h2 class="subtitle">Cadastrar Tarefa</h2>
        <form action="{{route('newTask', [$user->id])}}" method="post">
            @csrf
            <div class="form-group">
                <label class="form-label" for="title">Título:</label>
                <input class="form-input" type="text" id="title" name="title" placeholder="Título">
            </div>
            <div class="form-group">
                <label class="form-label" for="description">Descrição:</label>
                <input type="text" class="form-input-task" id="description" name="task" placeholder="Descreva a tarefa"></input>
            </div>
            <button class="form-btn" type="submit">Salvar</button>
        </form>
    </div>
</div>
</body>
</html>
