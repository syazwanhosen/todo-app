
@extends('components.layout')

@section('content')
    <div class="wrapper">
      <div class="controls">
        <div class="filters">
          <span class="active" id="all">All</span>
          <span id="pending">Pending</span>
          <span id="completed">Completed</span>
        </div>
      </div>
          @forelse ($tasks as $task)
        <p  class="task-box" >
                <a href="{{ route('tasks.show', ['task' => $task->id]) }}" >{{ $task->description }}</a>

            <a href="{{ route('tasks.edit', ['task' => $task->id]) }}">
                Edit
            </a>

              <form method="POST"
                            action="{{ route('tasks.destroy', ['task' => $task->id]) }}">
                            @csrf
                            @method('DELETE')

                            <input type="submit" value="Delete"/>
                        </form>
                        
          
        </p>
    @empty
        <p>No tasks yet!</p>
    @endforelse
    </div>

 @endsection