@extends('app.layouts.basic')

@section('title', $title)

@section('content')
<div class="container mt-3">
    <nav class="navbar navbar-expand-md">
        <button class="navbar-toggler mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#filterCollapse">
            <i class="fa fa-filter text-primary"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="filterCollapse">
            <ul class="navbar-nav me-5 mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ (request()->query('status') === 'pending' || request()->query('status') == null ) ? 'active' : '' }}" href="{{route('app.status', ['status' => 'pending'])}}">Pending</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->query('status') === 'completed' ? 'active' : '' }}" href="{{route('app.status', ['status' => 'completed'])}}">Completed</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->query('status') === 'all' ? 'active' : '' }}" href="{{route('app.status', ['status' => 'all'])}}">All Tasks</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="{{ route('app.orderby') }}" method="GET">
                <div class="input-group">
                    <span class="input-group-text">Sort by</span>
                    <select class="form-select" name="orderby" id="orderby">
                        <option value="created_at" {{ request()->query('orderby') === 'created_at' ? 'selected':'' }}>Date Created</option>
                        <option value="completion_deadline" {{ request()->query('orderby') === 'completion_deadline' ? 'selected':'' }}>Completion Deadline</option>
                    </select>
                    <input type="hidden" name="search" value="{{ request()->query('search') }}">
                    <input type="hidden" name="status" value="{{ request()->query('status') }}">
                    <span>
                        <button class="btn btn-primary my-2 my-sm-0" type="submit">Sort</button>
                    </span>
                </div>
            </form>

            <form class="form-inline my-2 my-lg-0" action="{{ route('app.search') }}" method="GET">
                <div class="input-group">
                    <input value="{{$request['search'] ?? ''}}" placeholder="Search" aria-label="Search" type="search" class="form-control mr-sm-2" id="search" name="search">
                    <input type="hidden" name="orderby" value="{{ request()->query('orderby') }}">
                    <input type="hidden" name="status" value="{{ request()->query('status') }}">
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
                    <td>
                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#checkModal_{{$task->id}}">
                            <i class="fa-regular {{$task->checked == 0 ? 'fa-square' : 'fa-square-check'}}"></i>       
                        </button>

                        <div class="modal fade" id="checkModal_{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="checkModal_{{$task->id}}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="checkModal_{{$task->id}}">{{$task->checked == 0 ? 'Check' : 'Uncheck'}} Task</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to {{$task->checked == 0 ? 'check' : 'uncheck'}} this task?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                    <a class="btn btn-primary" href="{{route($task->checked == 0 ? 'task.check' : 'task.uncheck', ['task' => $task->id])}}">{{$task->checked == 0 ? 'Check' : 'Uncheck'}}</a>
                                </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td><a class="btn btn-sm btn-primary" href="{{route('task.edit', ['task' => $task->id])}}">Edit</a></td>
                    <td>
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal_{{$task->id}}">
                            Delete
                        </button>

                        <div class="modal fade" id="deleteModal_{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModal_{{$task->id}}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModal_{{$task->id}}">Delete Task</h5>
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this task?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                    <form id="form_delete_{{$task->id}}" method="post" action="{{route('task.destroy', ['task'=>$task->id])}}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" class="btn btn-danger" onclick="document.getElementById('form_delete_{{$task->id}}').submit()">Delete</a>
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