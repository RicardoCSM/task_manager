@extends('app.layouts.basic')

@section('title', $title)

@section('content')
<div class="container mt-5">
    <div class="row mb-3">
        <div class="col-md-7">
            <form action="{{ route('app.search') }}" method="GET">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="search">Search task:</label>
                    <div class="col-sm-8">
                        <input value="{{$request['search'] ?? ''}}" type="text" class="form-control" id="search" name="search">
                        <input type="hidden" name="orderby" value="{{ request()->query('orderby') }}">
                    </div>
                    <button class="col-sm-2 btn btn-sm btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
        
        <div class="col-md-5">
            <form action="{{ route('app.orderby') }}" method="GET">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="orderby">Sort by:</label>
                    <div  class="col-sm-8">
                        <select class="form-control" name="orderby" id="orderby">
                            <option value="created_at" {{ request()->query('orderby') === 'created_at' ? 'selected':'' }}>Date Created</option>
                            <option value="completion_deadline" {{ request()->query('orderby') === 'completion_deadline' ? 'selected':'' }}>Completion Deadline</option>
                        </select>
                        <input type="hidden" name="search" value="{{ request()->query('search') }}">
                    </div>
                    <button class="col-sm-2 btn btn-sm btn-primary" type="submit">Sort</button>
                </div>
            </form>
        </div>
    </div>

    <table class="table table-bordered border-primary">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Task</th>
                <th scope="col">Completion Deadline</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <th scope="row">{{$task->id}}</th>
                    <td>{{$task->task}}</td>
                    <td>{{date("d/m/Y", strtotime($task->completion_deadline))}}</td>
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

    <div class="d-flex justify-content-center">
        {!! $tasks->links() !!}
    </div>
    
</div>


@endsection