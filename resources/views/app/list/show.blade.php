@extends('app.layouts.basic')

@section('title', $title)

@section('content')
    
<div class="container mt-5">
        <div>
            <h1>{{$list->list}}</h1>
            <p><strong class="h5">Description: </strong>{{$list->desc}}</p>
        </div>
        @if(isset($tasks) && $tasks !== '')
        <table class="table table-bordered border-primary">
            <thead>
                <tr>
                    <th scope="col">Task</th>
                    <th scope="col">Completion Deadline</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{$task->task}}</td>
                        <td>{{date("d/m/Y", strtotime($task->completion_deadline))}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endif
        <div>
            <a href="{{route('list.index')}}" class="btn btn-lg btn-primary">Back</a>
            <a href="{{route('task.create', ['list_id' => $list->id])}}" class="btn btn-lg ms-5 btn-primary">Add New Task</a>
        </div>
</div>


@endsection