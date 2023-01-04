<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Task</title>
</head>
<body>
    <form  method="POST" action="{{ route('todo.store') }}">
        @csrf
         <input type="text" name="description" placeholder="Add task"/>
        <input type="submit" value="Confirm"/>
    </form>
</body>
</html>