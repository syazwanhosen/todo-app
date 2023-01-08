
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
          @if ($task->user_id == Auth::user()->id)
          <p  class="task-box" >
            
        
                <a href="{{ route('tasks.show', ['task' => $task->id]) }}" >{{ $task->description }}</a>

                @if ($task->status == "1")
                  <p>Completed</p>
                  @else
                  <p>Pending</p>
                @endif
            <a href="{{ route('tasks.edit', ['task' => $task->id]) }}">
                Edit
            </a>

              <form method="POST"
                            action="{{ route('tasks.destroy', ['task' => $task->id]) }}">
                            @csrf
                            @method('DELETE')

                            <input type="submit" value="Delete"/>
                        </form>

                        @if ($task->status == "1")
                            <form method="POST"
                            action="{{ route('tasks.update', ['task' => $task->id]) }}">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="description" value="{{ old('description', $task->description) }}"/>
                            <input name="status" type="hidden" id="status" value="0">
                            <input type="submit" value="Change Status" />
                        </form>
                        @else
                          <form method="POST"
                            action="{{ route('tasks.update', ['task' => $task->id]) }}">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="description" value="{{ old('description', $task->description) }}"/>
                            <input name="status" type="hidden" id="status" value="1">
                            <input type="submit" value="Change Status" />
                        </form>
                        @endif
            

                      </p>
                      @endif   
    @empty
        <p>No tasks yet!</p>
    @endforelse
    </div>

 @endsection