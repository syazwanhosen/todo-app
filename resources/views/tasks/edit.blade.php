@extends('components.layout')

@section('content')
    <form method="POST" 
          action="{{ route('tasks.update', ['task' => $task->id]) }}">
        @csrf
        @method('PUT')

        <p>
            <label>Task Name</label>
            <input type="text" name="description" 
                value="{{ old('description', $task->description) }}"/>
        </p>
       

        @if($errors->any())
            <div>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <button type="submit">Update!</button>
    </form>
@endsection