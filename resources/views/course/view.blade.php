@extends('layouts.app')
@section('content')

<section class="header-course">
    <div class="ccontainer">
        <div class="row">
            <div class="col-md-12">
                @if($course->photo)
                    <img src="{{url($course->photo)}}" class="img-responsive center-block img-circle" width="200px" height="200px">
                @else
                    <img src="{{asset('images/placeholder.gif')}}" class="img-responsive center-block img-circle" width="200px" height="200px">
                @endif
            </div>
            <div class="col-md-12 text-center">
                <div class="section-title">
                    <h2>{{$course['name']}}</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="ccontainer">
        <div class="row">
            <div class="col-md-7">
                <nav class="navbar navbar-default">
                    <ul class="nav navbar-nav" style="display:flex;flex-direction:row">
                        <li><a href="{{url('course/'. $id .'/details')}}">الوصف</a></li>
                        <li><a href="{{url('course/'. $id .'/course_content')}}" class="active">المحتوى</a></li>
                        <!--   <li><a href="#">التقيم</a></li>-->
                        <li><a href="{{url('course/' .$id .'/comments')}}">التعليقات</a></li>
                    </ul>
                </nav>
                <div class="col-md-12">
                    @yield('course_content')
                </div>
            </div>

            <div class="col-md-4">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-headeing">
                            <!--<video src="></video>-->
                            @if($course->intro_video)
                            <iframe width="400" height="315" src="{{$course->intro_video}}" frameborder="0" allow="autoplay; encrypted-media" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            @endif
                        </div>
                        <div class="panel-body">
                            
                            @if(null !== Auth::user() && Auth::user()->role == 'STUDENT')
                                @php $is_registered =  App\StudentCourse::where('course_id',$course->id)->where('student_id',Auth::user()->id)->first()   @endphp
                                @if($is_registered === null)
                                    <a href="{{url('course/'. $course->id .'/register')}}" class="btn btn-info">
                                        تسجيل
                                    </a>
                                @else
                                    <a href="#" class="btn btn-info">
                                        انت مسجل في هذه الدوره
                                    </a>
                                @endif

                            @endif
                            <div class="rank">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <ul class="deteals">
                                <ul class="deteals">
                                    <li><i class="fas fa-hourglass-start"></i> الزمان : {{$course['time']}} </li>
                                    <li><i class="fas fa-location-arrow"></i> المكان : {{$course['location']}} </li>

                                </ul>
                                <ul class="deteals ">
                                    <li><i class="fas fa-calendar-alt"></i> المده :{{$course['duration']}}</li>
                                    <li class="fla"><i class="fas fa-users"></i> المفاعد: {{$course['number_of_seats']}} </li>
                                </ul>
                            </ul>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="col-md-3">
                            <img src="{{asset('images/man.png')}}" class="img-responsive" width="100px" height="100px">
                        </div>
                        <div class="text-detels ">
                            <h4><a href="{{url('/user/'. $course->trainer->id)}}">{{$course->trainer->name }} </a><a href="{{url('/user/messages')}}"><i class="fas fa-envelope-square"></i></a></div></h4>
                            <p>{{$course->trainer->university}}-{{$course->trainer->major}}</p>

                            <div></div>
                        </div>

                        <div class="panel-footer">

                            <h3>#</h3>

                            <h4>الثقافه و الفن</h4>

                            <span>شارك الدروس </span>

                            <i class="fab fa-twitter"></i>
                            <i class="fab fa-facebook-f"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="col-md-12">

            </div>
        </div>
    </div>

</section>

<!-- pop windo for Login -->
<div class="modal fade" id="Login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">تسجيل في الدورة  </h4>
            </div>
            <div class="modal-body">

                <img src="{{asset('images/logo.png')}}" width="150px" height="150px" class="center-block">
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <input type="number" name="" placeholder="االسجل المدني  " class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <input type="number" name="" placeholder="السجل الاكاديمي" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                <button type="button" class="btn btn-primary">تسجيل دخول </button>
            </div>
        </div>
    </div>
</div>

@endsection