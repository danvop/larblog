<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        a:link {text-decoration: none;}
    </style>
    <title></title>
</head>
<body>

    <ul>
        @foreach($tasks as $task)
        <li>
            <b><a href="tasks/{{$task->id}}">{{ $task->title }}</a></b>
            <p>{{ $task->body }}</p>
        </li>
        @endforeach
    </ul>

</body>
</html>