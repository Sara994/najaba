@extends('layouts.app')

@section('content')
    @foreach($courses as $course)
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="{{url('course/'.$course->id)}}">
                <div class="panel panel-default">
                    <div class="panel-header">
                        @if($course->photo)
                            <img style="max-width:100%;max-height:100%" src="{{url($course->photo)}}" alt="silder1" class="img-responsive">
                        @else
                            <img style="max-width:100%;max-height:100%" src="{{asset('images/placeholder.gif')}}" alt="silder1" class="img-responsive">
                        @endif
                    </div>
                    <div class="panel-body text-center">
                        <p> {{$course->name}}</p>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
@endsection