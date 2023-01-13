@extends('app.layouts.basic')

@section('title', $title)

@section('content')

<div class="container mt-5">
    
   <table class="table table-bordered border-primary">
        <thead>
            <tr>
                <th scope="col">List</th>
                <th scope="col">Description</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lists as $list)
                <tr>
                    <td>{{$list->list}}</td>
                    <td>{{$list->desc}}</td>
                    <td><a class="btn btn-sm btn-primary" href="{{route('list.show', ['list' => $list->id])}}">Show</a></td>
                    <td><a class="btn btn-sm btn-primary" href="{{route('list.edit', ['list' => $list->id])}}">Edit</a></td>
                    <td>
                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal_{{$list->id}}">
                            Delete
                        </button>

                        <div class="modal fade" id="deleteModal_{{$list->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModal_{{$list->id}}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModal_{{$list->id}}">Delete List</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this list?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                    <form id="form_{{$list->id}}" method="post" action="{{route('list.destroy', ['list'=>$list->id])}}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" class="btn btn-danger" onclick="document.getElementById('form_{{$list->id}}').submit()">Delete</a>
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
        {!! $lists->links() !!}
    </div>
</div>


@endsection