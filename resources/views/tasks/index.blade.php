
@extends('components.layout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tasks List') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
              
 <table class="table">
  <thead>
    <tr>
      <th scope="col" class="col-6 ">Description</th>
      <th scope="col">Status</th>
      <th scope="col" class="text-center">Action</th>
    </tr>
  </thead>
  <tbody>
      @forelse ($tasks as $task)
          
          @if ($task->user_id == Auth::user()->id)
          <tr>
      <th scope="row" >

          <p>
            
        
                <a href="{{ route('tasks.show', ['task' => $task->id]) }}" >{{ $task->description }}</a>
      <td >

                @if ($task->status == "1")
                  <span class="badge bg-success">Completed</span>
                  @else
                  <span class="badge bg-warning">Pending</span>
                @endif
      </td>
      <td class="d-flex justify-content-end gap-1" >

            <a href="{{ route('tasks.edit', ['task' => $task->id]) }}" class="btn btn-primary">
                Edit
            </a>

              <form method="POST"
                            action="{{ route('tasks.destroy', ['task' => $task->id]) }}">
                            @csrf
                            @method('DELETE')

                            <input type="submit" value="Delete"  class="btn btn-danger" />
                        </form>


                        @if ($task->status == "1")
                            <form method="POST"
                            action="{{ route('tasks.update', ['task' => $task->id]) }}">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="description" value="{{ old('description', $task->description) }}"/>
                            <input name="status" type="hidden" id="status" value="0">
                            <input type="submit" value="Change Status" class="btn btn-dark" />
                        </form>
                        @else
                          <form method="POST"
                            action="{{ route('tasks.update', ['task' => $task->id]) }}">
                            @csrf
                            @method('PUT')

                            <input type="hidden" name="description" value="{{ old('description', $task->description) }}"/>
                            <input name="status" type="hidden" id="status" value="1">
                            <input type="submit" value="Change Status" class="btn btn-dark" />
                        </form>
                        @endif
      </td>

                      </p>
                      </th>
                      </tr>
                      @endif   
    @empty
        <p>No tasks yet!</p>
    @endforelse
  
  </tbody>
</table>
                </div>
            </div>
        </div>
    </div>
</div>

  

 @endsection