@extends('app.layouts.basic')

@section('title', $title)

@section('content')
    
    <section id="options">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card text-center border-primary">
                        <div class="card-body">
                            <i class="fa-solid fa-plus text-primary"></i>
                            <div class="mt-5">
                                <a href="{{route('task.create')}}" class="btn btn-lg btn-primary">Create</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4 mb-4">
                    <div class="card text-center border-primary">
                        <div class="card-body">
                            <i class="fa-sharp fa-solid fa-check-to-slot text-primary"></i>                        
                            <div class="mt-5">
                                <a href="{{route('task.index')}}" class="btn btn-lg btn-primary">Tasks</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <div class="card text-center border-primary">
                        <div class="card-body">
                            <i class="fa-solid fa-list text-primary"></i>                        
                            <div class="mt-5">
                                <a href="{{route('list.index')}}" class="btn btn-lg btn-primary">Lists</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection