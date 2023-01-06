@extends('app.layouts.basic')

@section('title', $title)

@section('content')

<div class="container-fluid mt-5">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Task</th>
                <th scope="col">Completion Deadline</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <th scope="row">{{$task->id}}</th>
                    <td>{{$task->task}}</td>
                    <td>{{$task->completion_deadline}}</td>
                    <td><a class="btn btn-sm btn-primary" href="{{route('task.show', ['task' => $task->id])}}">Show</a></td>
                    <td><a class="btn btn-sm btn-primary" href="{{route('task.edit', ['task' => $task->id])}}">Edit</a></td>
                    <td>
                        <form id="form_{{$task->id}}" method="post" action="{{route('task.destroy', ['task'=>$task->id])}}">
                            @method('DELETE')
                            @csrf
                            <a href="#" class="btn btn-sm btn-danger" onclick="document.getElementById('form_{{$task->id}}').submit()">Excluir</a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection