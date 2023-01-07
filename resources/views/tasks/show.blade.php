@extends('components.layout')
 
@section('content')

<h1>{{ $task->description }}</h1>

    <p>Added {{ $task->created_at->diffForHumans() }}</p>

    @if ((new Carbon\Carbon())->diffInMinutes($task->created_at) < 5 )
        <strong>New!</strong>
    @endif

@endsection