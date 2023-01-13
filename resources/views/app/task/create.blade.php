@extends('app.layouts.basic')

@section('title', $title)

@section('content')
    <div class="container-fluid mt-5">

        <div class="card">
            <div class="card-header">
                Create Task
            </div>
            <div class="card-body">
                <form action={{ route('task.store')}} method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Task</label>
                        <input type="text" class="form-control @error('task') is-invalid @enderror" name="task" required>
                        @error('task')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Completion Deadline</label>
                        <input type="date" class="form-control @error('completion_deadline') is-invalid @enderror" name="completion_deadline" required>
                        @error('completion_deadline')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Add to List</label>
                        <select class="form-control" name="list_id">
                            <option value="">None</option>
                            @foreach ($lists as $list)
                                <option value="{{$list->id}}" {{ $list->id == $selected_list_id ? 'selected' : '' }}>{{$list->list}}</option>      
                            @endforeach
                        </select>
                        @error('list')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                {{isset($success) && $success != '' ? $success : ''}}
            </div>
        </div>
        
    </div>

@endsection