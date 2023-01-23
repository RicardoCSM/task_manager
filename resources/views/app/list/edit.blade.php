@extends('app.layouts.basic')

@section('title', $title)

@section('content')
    <div class="container-fluid mt-5">

        <div class="card border-primary">
            <div class="card-header bg-primary text-light">
                Edit List
            </div>
            <div class="card-body">
                <form action={{ route('list.update', ['list' => $list->id])}} method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">List</label>
                        <input value="{{$list->list}}" type="text" class="form-control @error('list') is-invalid @enderror" name="list" required>
                        @error('list')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">List Description</label>
                        <textarea class="form-control @error('desc') is-invalid @enderror" name="desc">{{$list->desc}}</textarea>
                        @error('desc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <a href="{{route('list.index')}}" class="btn btn-primary">Back</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                {{isset($success) && $success != '' ? $success : ''}}
            </div>
        </div>
        
    </div>

@endsection