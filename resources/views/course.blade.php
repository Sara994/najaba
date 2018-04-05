@extends('layouts.app')

@section('content')
    @foreach($courses as $course)
        <div class="flex-center position-ref">
            {{$course->name}}
        </div>
    @endforeach
@endsection