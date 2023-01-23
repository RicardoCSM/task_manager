@extends('app.layouts.basic')

@section('title', $title)

@section('content')
    <div class="container-fluid mt-5">

        <div class="card border-primary">
            <div class="card-header bg-primary text-light">
                Create New List
            </div>
            <div class="card-body">
                <form action={{ route('list.store')}} method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">List</label>
                        <input type="text" class="form-control @error('list') is-invalid @enderror" name="list" required>
                        @error('list')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">List Description</label>
                        <textarea class="form-control @error('desc') is-invalid @enderror" name="desc"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        
    </div>

@endsection