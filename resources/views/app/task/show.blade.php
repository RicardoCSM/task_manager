@extends('app.layouts.basic')

@section('title', $title)

@section('content')
    
<div class="container mt-5">
        <div>
            <h2 class="display-5">{{$task->task}}</h2>
            <h3>Completion Deadline: {{date("d/m/Y", strtotime($task->completion_deadline))}}</h3>
        </div>
        <div>
            <a href="{{route('task.index')}}" class="btn btn-lg btn-primary">Back</a>
        </div>
</div>


@endsection