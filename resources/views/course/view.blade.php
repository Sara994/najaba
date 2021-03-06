@extends('layouts.app')
@section('content')

<section class="header-course">
    <div class="ccontainer">
        <div class="row" style="position:relative">
            @guest
            @else
            @if( Auth::user()->id == $course->trainer->id )
            <div style="position:absolute;left:10%;top:0px;z-index:1000">
                <a href="{{url('course/' . $course->id . '/edit')}}" class="btn btn-info">تعديل</a>
                <a href="{{url('course/' . $course->id . '/delete')}}" class="btn btn-danger">حذف</a>
                <a href="{{url('course/' . $course->id . '/archieve')}}" class="btn btn-danger">أرشفة</a>
            </div>
            @endif
            @endguest
            {{-- <div class="col-md-12">
                @if($course->photo)
                    <img src="{{url($course->photo)}}" class="img-responsive center-block img-circle" width="200px" height="200px">
                @else
                    <img src="{{asset('images/placeholder.gif')}}" class="img-responsive center-block img-circle" width="200px" height="200px">
                @endif
            </div> --}}
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
                <nav class="navbar navbar-default" style="background-color: #FFF">
                    <ul class="nav navbar-nav" style="display:flex;flex-direction:row">
                        <li><a href="{{url('course/'. $id .'/details')}}">الوصف</a></li>
                        <li><a href="{{url('course/'. $id .'/course_content')}}" class="active">المحتوى</a></li>
                        <!--   <li><a href="#">التقيم</a></li>-->
                        <li><a href="{{url('course/' .$id .'/comments')}}">التعليقات</a></li>
                        <li><a href="{{url('course/' .$id .'/files')}}">الملفات</a></li>
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
                                    <a href="#" data-toggle="modal" data-target="#Login" class="btn btn-info">
                                        تسجيل
                                    </a>
                                @else
                                    <a style="width:auto" href="#" class="btn btn-info">
                                        انت مسجل في هذه الدوره
                                    </a>
                                @endif

                            @endif
                            @if($course->archieved && $is_registered  !== null)
                                <form class="rank starRating">
                                    <input class="fa fa-star" data-id="rating5" type="radio" name="star_num" value="5">
                                    <label data-id="rating5">5</label>
                                    <input data-id="rating4" type="radio" name="star_num" value="4">
                                    <label data-id="rating4">4</label>
                                    <input data-id="rating3" type="radio" name="star_num" value="3">
                                    <label data-id="rating3">3</label>
                                    <input data-id="rating2" type="radio" name="star_num" value="2">
                                    <label data-id="rating2">2</label>
                                    <input data-id="rating1" type="radio" name="star_num" value="1">
                                    <label data-id="rating1">1</label>
                                    <input type="hidden" name="course_id" value="{{$course->id}}"> 
                                </form>
                            @endif
                            
                            {{-- <div class="rank">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div> --}}
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
                                    <li class="fla"><i class="fas fa-users"></i> المقاعد: {{$course['number_of_seats']}} </li>
                                </ul>
                            </ul>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="col-md-3">
                            @if(isset($course->trainer->profile_picture))
                            <img src="{{url($course->trainer->profile_picture)}}" class="img-responsive" width="100px" height="100px">
                            @else
                                <img src="{{asset('images/man.png')}}" class="img-responsive" width="100px" height="100px">
                            @endif
                        </div>
                        <div class="text-detels ">
                            <h4><a href="{{url('/user/'. $course->trainer->id)}}">{{$course->trainer->name }} </a></div></h4>
                            <p>{{$course->trainer->university}}-{{$course->trainer->major}}</p>

                            <div></div>
                        </div>

                        <div class="panel-footer">
                            <h4>{{$course->category()}}</h4>
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
                            <input required type="number" name="" placeholder="االسجل المدني  " class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-2">
                            <input required type="number" name="" placeholder="السجل الاكاديمي" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                <a href="{{url('course/'. $course->id .'/register')}}" class="btn btn-info">تسجيل دخول </a>
            </div>
        </div>
    </div>
</div>

@endsection