<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>
        The lists of tasks
    </h1>

    <div>
@forelse ($tasks as $task)

    <div> 
        <a href="{{route('tasks.show', ['id'=> $task->id])}}">{{$task->title}}</a>
    </div>
@empty
    <div> There are no tasks !</div>
    
@endforelse
    </div>
</body>
</html>