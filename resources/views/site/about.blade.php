@extends('site.layouts.basic')

@section('title', $title)

@section('content')
    
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex">
                    <div class="align-self-center">
                        <h2>Task Manager, our history</h2>
                        <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut purus purus. Curabitur vitae quam vestibulum, interdum felis sed, auctor nulla. Morbi vel pharetra nibh, sit amet aliquam justo. Nam est metus, fermentum et lectus pulvinar, vestibulum mattis quam. Nullam massa enim, malesuada a massa sit amet, aliquet finibus eros. Cras interdum odio vel ultrices rhoncus. Quisque tempor odio et faucibus auctor.
                        </p>
                        <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut purus purus. Curabitur vitae quam vestibulum, interdum felis sed, auctor nulla. Morbi vel pharetra nibh, sit amet aliquam justo. Nam est metus, fermentum et lectus pulvinar, vestibulum mattis quam. Nullam massa enim, malesuada a massa sit amet, aliquet finibus eros. Cras interdum odio vel ultrices rhoncus. Quisque tempor odio et faucibus auctor.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 d-flex">
                    <div class="align-self-center">
                        <img class="img-fluid" src="{{ asset('img/task-about.jpg') }}" alt="">    
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection