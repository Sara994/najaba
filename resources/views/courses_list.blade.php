@extends('layouts.app')

@section('content')
    @if(count($courses) == 0)
        <div style="text-align:center">لا يوجد أي دورات</div>
    @endif
    @foreach($courses as $course)
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-header">
                    <img src="{{$course->photo ? url($course->photo):url('images/placeholder.gif')}}" alt="silder1" class="img-responsive">
                </div>
                <div class="panel-body text-center">
                    <a href="{{url('/course/' . $course->id)}}"><p>{{$course->name}}</p></a>
                    <a href="{{url('/user/' . $course->trainer->id)}}"> <p>{{$course->trainer->name}}</p></a>
                    <p>عدد المقاعد :{{$course->number_of_seats}}</p>
                    @php $rating = $course->rating() @endphp
                    <div class="rank ">
                        <span class="fa fa-star {{$rating > 0 ? 'checked':''}}"></span>
                        <span class="fa fa-star {{$rating > 1 ? 'checked':''}}"></span>
                        <span class="fa fa-star {{$rating > 2 ? 'checked':''}}"></span>
                        <span class="fa fa-star {{$rating > 3 ? 'checked':''}}"></span>
                        <span class="fa fa-star {{$rating > 4 ? 'checked':''}}"></span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection