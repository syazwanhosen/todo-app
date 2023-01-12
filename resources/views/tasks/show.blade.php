@extends('components.layout')
 
@section('content')



    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Task Details') }}</div>

                <div class="card-body">
    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
 
                    <div class="d-flex align-items-center ">
                    <h1 class="blockquote col-9">{{ $task->description }} @if ((new Carbon\Carbon())->diffInMinutes($task->created_at) < 5 )
                  <span class="badge bg-info">New!</span>

    @endif</h1>

    <p class="blockquote-footer col-3" >Added {{ $task->created_at->diffForHumans() }}</p>
</div>

  
                </div>
            </div>
        </div>
    </div>
</div>

@endsection