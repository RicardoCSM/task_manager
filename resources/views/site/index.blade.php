@extends('site.layouts.basic')

@section('title', $title)

@section('content')
    
    <section id="index">
      <div class="container p-2">
        <div class="row">
          <div class="col-md-6 d-flex">
            <div class="align-self-center">
                <h1 class="display-4">Take care of your tasks, in a simple way</h1>
              
                <p>
                    Used by over 1 million people, Task Manager is an online tool
                    that will make your routine easier. 
                </p>

                <div class="mt-4 mb-4">
                    <a href="{{route('site.register')}}" class="btn btn-lg btn-primary">Sign Up</a>
                </div>
            </div>
          </div>
          <div class="col-md-6 d-none d-md-block">
            <img class="img-fluid" src="{{ asset('img/task-index.jpg') }}">
          </div>
        </div>
      </div>
    </section>

    <section id="resources">
      <div class="container border-top border-primary mb-4">
        <div class="row">
          <div class="col-md-4">
            <img src="{{ asset('img/task-organize.jpg') }}" class="img-fluid">
            <h4>Organize</h4>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rutrum nisl in turpis tempus, a scelerisque dui ultricies. Proin sollicitudin, risus quis ultrices.
            </p>
          </div>
          <div class="col-md-4">
            <img src="{{ asset('img/task-certify.jpg') }}" class="img-fluid">
            <h4>Certify</h4>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rutrum nisl in turpis tempus, a scelerisque dui ultricies. Proin sollicitudin, risus quis ultrices.
            </p>
          </div>
          <div class="col-md-4">
            <img src="{{ asset('img/task-time.jpg') }}" class="img-fluid">
            <h4>Complete</h4>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur rutrum nisl in turpis tempus, a scelerisque dui ultricies. Proin sollicitudin, risus quis ultrices.
            </p>
          </div>
        </div>
      </div>
    </section><!-- Fim Seção Recursos -->

@endsection