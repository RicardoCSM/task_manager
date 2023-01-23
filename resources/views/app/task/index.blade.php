@extends('app.layouts.basic')

@section('title', $title)

@section('content')
<div class="container mt-3">
    <nav class="navbar navbar-expand-md">
        <button class="navbar-toggler mb-2" type="button" data-toggle="collapse" data-target="#filterCollapse">
            <i class="fa fa-filter text-primary"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="filterCollapse">
            <form class="form-inline my-2 my-lg-0" action="{{ route('app.orderby') }}" method="GET">
                <div class="input-group">
                    <span class="input-group-text">Sort by</span>
                    <select class="form-select" name="orderby" id="orderby">
                        <option value="created_at" {{ request()->query('orderby') === 'created_at' ? 'selected':'' }}>Date Created</option>
                        <option value="completion_deadline" {{ request()->query('orderby') === 'completion_deadline' ? 'selected':'' }}>Completion Deadline</option>
                    </select>
                    <input type="hidden" name="search" value="{{ request()->query('search') }}">
                    <span>
                        <button class="btn btn-primary my-2 my-sm-0" type="submit">Sort</button>
                    </span>
                </div>
            </form>

            <form class="form-inline my-2 my-lg-0" action="{{ route('app.search') }}" method="GET">
                <div class="input-group">
                    <input value="{{$request['search'] ?? ''}}" placeholder="Search" aria-label="Search" type="search" class="form-control mr-sm-2" id="search" name="search">
                    <input type="hidden" name="orderby" value="{{ request()->query('orderby') }}">
                    <span>
                        <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
    </nav>
</div>

<div class="container mt-2">
    <table class="table">
        <thead class="bg-primary text-light">
            <tr>
                <th scope="col">#</th>
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
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_{{$task->id}}">
                            Delete
                        </button>

                        <div class="modal fade" id="deleteModal_{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModal_{{$task->id}}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModal_{{$task->id}}">Delete Task</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this task?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                    <form id="form_{{$task->id}}" method="post" action="{{route('task.destroy', ['task'=>$task->id])}}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" class="btn btn-danger" onclick="document.getElementById('form_{{$task->id}}').submit()">Delete</a>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>

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