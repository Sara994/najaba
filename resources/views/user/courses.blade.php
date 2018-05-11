@extends('layouts.app')
@section('content')






@if(Auth::user()->role == 'STUDENT')


<div class="edit-4">
		<div class="col-md-11">
        <img src="{{$user->profile_picture ? url($user->profile_picture): asset('images/man.png')}}" class="img-responsive center-block" width="100px" height="100px">
</div>

<div class="nm">
<div class="text-center">
		<h2>{{$user->name}}</h2>
		<a href="{{url('/user/edit')}}" class="btn btn-info text-center bttoun">تعديل</a>
</div>
</div>
</div>






<section >
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="navbar navbar-light" style="background-color: #ffffff; border-color:#EAECEE">
                    <ul class="nav navbar-nav" style="display:flex;flex-direction:row">
                        <li>
                            <a href="{{url('/user/profile')}}">الملف الشخصي</a>
                        </li>
                        <li>
                            <a href="{{url('/user/courses')}}">الدورات</a>
                        </li>
                        <li>
                            <a href="{{url('/user/messages')}}">الرسائل</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                @foreach($user->attending_courses as $course)
                <div class="col-md-3 ">
                    <div class="panel panel-default">
                        <div class="panel-header">
                            <img src="{{$course->photo ? url($course->photo) : asset('images/placeholder.gif')}}" alt="silder1" class="img-responsive">
                            </div>
                            <div class="panel-body text-center">
                                <a href="{{url('/course/' . $course->id)}}">
                                    <p>{{$course->name}}</p>
                                </a>
                                <a href="{{url('/user/' . $course->trainer->id)}}">
                                    <p>{{$course->trainer->name}}</p>
                                </a>
                                <p>عدد المقاعد :{{$course->number_of_seats}}</p>
                                @php $rating = $course->rating() @endphp
                                <div class="rank ">
                                    <span class="fa fa-star {{$rating > 0 ? 'checked':''}}"></span>
                                    <span class="fa fa-star {{$rating > 1 ? 'checked':''}}"></span>
                                    <span class="fa fa-star {{$rating > 2 ? 'checked':''}}"></span>
                                    <span class="fa fa-star {{$rating > 3 ? 'checked':''}}"></span>
                                    <span class="fa fa-star {{$rating > 4 ? 'checked':''}}"></span>
                                </div>
                                <!-- <div><span>المدرب</span><p>احمد </p></div>-->
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <br>
    <br>
</section>
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