<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
    <nav>
        <h2>Todo Application</h2>
    <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        {{-- <li><a href="{{ route('contact') }}">Contact</a></li> --}}
        <li><a href="{{ route('tasks.index') }}">Task List</a></li>
        <li><a href="{{ route('tasks.create') }}">Add Task</a></li>
    </ul>
    </nav>

    @if(session()->has('status'))
        <p style="color: green">
            {{ session()->get('status') }}
        </p>
    @endif

    @yield('content')
</body>
</html>