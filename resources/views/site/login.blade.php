@extends('site.layouts.basic')

@section('title', $title)

@section('content')
    <div class="container-fluid mt-5">

        <div class="card border-primary">
            <div class="card-header bg-primary text-light">
                Sign In
            </div>
            <div class="card-body">
                <form action={{ route('site.login')}} method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                {{isset($error) && $error != '' ? $error : ''}}
            </div>
        </div>
        
    </div>

@endsection