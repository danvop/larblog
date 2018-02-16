<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <ul>
        @foreach ($tasks as $task)
            <li>
                <h3>{{ $task->title }}</h3>
                {{ $task->body }}
            </li>
        @endforeach  
    </ul>


</body>
</html>