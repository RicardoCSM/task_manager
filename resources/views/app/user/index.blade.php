@extends('app.layouts.basic')

@section('title', $title)

@section('content')
    <div class="container-fluid mt-5">
        <div class="text-center mb-3">
            <h2>User Profile</h2>
        </div>
        <div class="card border-primary">
            <div class="card-header bg-primary text-light">
                Edit Name
            </div>
            <div class="card-body">
                <form action={{ route('user.update.name')}} method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input value="{{$user->name}}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
                {{isset($success) && $success != '' ? $success : ''}}
            </div>
        </div>

        <div class="card border-primary mt-3">
            <div class="card-header bg-primary text-light">
                Edit Email
            </div>
            <div class="card-body">
                <form action={{ route('user.update.email')}} method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input value="{{$user->email}}" type="text" class="form-control @error('email') is-invalid @enderror" name="email" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>

        <div class="card border-primary mt-3 mb-3">
            <div class="card-header bg-primary text-light">
                Edit Password
            </div>
            <div class="card-body">
                <form action={{ route('user.update.password')}} method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Current Password</label>
                        <input type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required>
                        @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" required>
                        @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password_confirmation" required>
                    </div>
                
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>

            <button type="button" class="btn btn-lg btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#deleteModal">
                Delete
            </button>

            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModal">Delete Task</h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this account?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                            <form method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        
    </div>
@endsection