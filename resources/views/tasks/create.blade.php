@extends('components.layout')


{{-- 
    <div class="wrapper">
      <div class="task-input">
        <img src="{{  URL::asset('assets/img/bars-icon.svg') }}" alt="icon">
        <input type="text" placeholder="Add a new task">
      </div>
      <div class="controls">
        <div class="filters">
          <span class="active" id="all">All</span>
          <span id="pending">Pending</span>
          <span id="completed">Completed</span>
        </div>
        <button class="clear-btn">Add Task</button>
      </div>
      <ul class="task-box"></ul>
    </div>
    <script src="{{ URL::asset('assets/js/script.js') }}"></script> --}}

@section('content')
    <form  method="POST" action="{{ route('tasks.store') }}">
        @csrf
         <input type="text" name="description" placeholder="Add task"/>
          <input name="user_id" type="hidden" value={{ Auth::user()->id }}>
        <input type="submit" class="clear-btn" value="Confirm"/>
    </form>
@endsection