@extends('layouts.app')

@section('content')
    
@php $upcoming_courses = App\Course::whereNull('content')->orWhere('content','like',' ')->orderBy('created_at', 'desc')->limit(3)->get() @endphp

@if(count($upcoming_courses) > 0)
    <section class="row">
        <div class="col-md-12 text-center silder-text">
            <h2>الدورات القادمة</h2>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel">
                <div class="carousel-inner">
                    <div class="item active">
                        @foreach($upcoming_courses as $course)
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
                    </div>

                    <div class="item">
                        @foreach(App\Course::whereNull('content')->orWhere('content','like',' ')->orderBy('created_at', 'desc')->limit(3)->offset(3)->get() as $course)
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
                    </div>

                </div>

                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <i class="glyphicon glyphicon-chevron-right"></i>
                </a>
                <!--</div>
                    </div>-->
            </div>
        </div>
    </section>
@endif

@php $active_courses = App\Course::whereNotNull('content')->where('archieved',false)->orderBy('created_at', 'desc')->limit(3)->get()  @endphp
@if(count($active_courses) > 0)
    <section class="row">
        <div class="col-md-12 text-center silder-text">
            <h2>الدورات الحالية</h2>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel1">
                <div class="carousel-inner">
                    <div class="item active">
                        @foreach($active_courses as $course)
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
                    </div>

                    <div class="item">
                        @foreach(App\Course::whereNotNull('content')->where('archieved',false)->orderBy('created_at', 'desc')->limit(3)->offset(3)->get() as $course)
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
                    </div>

                </div>

                <a class="left carousel-control" href="#myCarousel1" data-slide="prev">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                </a>
                <a class="right carousel-control" href="#myCarousel1" data-slide="next">
                    <i class="glyphicon glyphicon-chevron-right"></i>
                </a>
                <!--</div>
                    </div>-->
            </div>
        </div>
    </section>
@endif

@php $archieved_courses = App\Course::where('archieved',true)->orderBy('created_at', 'desc')->limit(3)->get() @endphp
@if( count($archieved_courses) > 0)
    <section class="row">
        <div class="col-md-12 text-center silder-text">
            <h2>الدورات المؤرشفة</h2>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel2">
                <div class="carousel-inner">
                    <div class="item active">
                        @foreach($archieved_courses as $course)
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
                    </div>

                    <div class="item">
                        @foreach(App\Course::where('archieved',true)->orderBy('created_at', 'desc')->limit(3)->offset(3)->get() as $course)
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
                    </div>

                </div>

                <a class="left carousel-control" href="#myCarousel2" data-slide="prev">
                    <i class="glyphicon glyphicon-chevron-left"></i>
                </a>
                <a class="right carousel-control" href="#myCarousel2" data-slide="next">
                    <i class="glyphicon glyphicon-chevron-right"></i>
                </a>
                <!--</div>
                    </div>-->
            </div>
        </div>
    </section>
@endif
@endsection