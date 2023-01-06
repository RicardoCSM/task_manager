@extends('app.layouts.basic')

@section('title', $title)

@section('content')
    
{{$task->task}}
<br>
{{$task->completion_deadline}}


@endsection