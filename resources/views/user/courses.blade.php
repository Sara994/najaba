@extends('user')
@section('user_content')
<div class="col-md-12 text-center">
    <h2 class=""> الدورات</h2>
</div>





@if(Auth::user()->role == 'STUDENT')
    @foreach($user->attending_courses as $course)
    <div class="col-md-4">
        
        <a href="{{url('course/' . $course->id )}}">
            <div class="panel panel-default">
            <div class="panel-header">
                @if($course->photo)
                    <img src="{{ url($course->photo) }}" alt="silder1" class="img-responsive">
                @else
                    <img src="{{ asset('images/placeholder.gif') }}" alt="silder1" class="img-responsive">
                @endif
            </div>
            <div class="panel-body text-center">
                <p>{{$course->name}}</p>
            </div>
            </div>
        </a>
    </div>
    @endforeach
@endif

@if(Auth::user()->role == 'TRAINER')
    @foreach($user->courses() as $course)
    <div class="col-md-4">
        
        <a href="{{url('course/' . $course->id )}}">
            <div class="panel panel-default">
            <div class="panel-header">
                @if($course->photo)
                    <img src="{{ url($course->photo) }}" alt="silder1" class="img-responsive">
                @else
                    <img src="{{ asset('images/placeholder.gif') }}" alt="silder1" class="img-responsive">
                @endif
            </div>
            <div class="panel-body text-center">
                <p>{{$course->name}}</p>
            </div>
            </div>
        </a>
    </div>
    @endforeach
@endif
@endsection