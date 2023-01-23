@extends('app.layouts.basic')

@section('title', $title)

@section('content')
    <div class="container-fluid mt-5">
        <div class="card border-primary">
            <div class="card-header bg-primary text-light">
                Edit Task
            </div>
            <div class="card-body">
                <form action={{ route('task.update', ['task' => $task->id])}} method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Task</label>
                        <input value="{{$task->task}}" type="text" class="form-control " name="task" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Completion Deadline</label>
                        <input value="{{$task->completion_deadline}}" type="date" class="form-control" name="completion_deadline" required>
                    </div>
                    <a href="{{route('task.index')}}" class="btn btn-primary">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                {{isset($success) && $success != '' ? $success : ''}}
            </div>
        </div>
        
    </div>

@endsection