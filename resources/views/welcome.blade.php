@extends('layouts.app')
@section('content')

<section class="header">
    <div class="header-all">
        <div class="container-rem">
            <div class="row">
                <div class="col-md-12 text-center">
                    <img src="{{asset('images/logo.png')}}">
                </div>
            </div>
        </div>

        <div class="containers-rem">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="text-center text-headers">
                        <p>دليلك لدورات تدريبية وتعليمية شاملة لكافة العلوم والمهارات قوي خبراتك ومهاراتك الان.
                        </p>
                    </div>
                </div>

                
                <div class="col-md-6 col-md-offset-4 log-marg">
                    @guest
                    <div class="col-md-4 ">
                        <a href="#" class="btn btn-info log-but " data-toggle="modal" data-target="#Login">تسجيل الدخول </a>
                    </div>

                    <div class="col-md-4 ">
                        <a href="#" class="btn log-but anm" data-toggle="modal" data-target="#register">تسجبل </a>
                    </div>
                    @endguest
                </div>
                

            </div>
        </div>
    </div>
</section>

<!-- pop windo for Login -->
<section>
    <div class="modal fade" id="Login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">تسجيل دخول </h4>
                    </div>
                    <div class="modal-body">

                        <img src="{{asset('images/logo.png')}}" width="150px" height="150px" class="center-block">
                        <form class="form-horizontal">
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-2">
                                    <input type="email" name="email" placeholder="البريد الالكتروني " class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-2">
                                    <input type="password" name="password" placeholder="الرقم السري" class="form-control">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-primary">تسجيل دخول </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
    <!-- pop wimdo for register -->
<section>
    <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">تسجيل </h4>
                </div>
                <form class="form-horizontal" method="post" action="{{ route('register') }}">
                    @csrf
                    <div class="modal-body">
                        <img src="{{asset('images/logo.png')}}" width="150px" height="150px" class="center-block">
                    
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <input type="text" name="name" placeholder="{{__('main.name')}}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <input type="email" name="email" placeholder="{{__('main.email')}}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <label>المهنه :</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked="checked" type="radio" name="role" value="STUDENT">
                                    <label class="form-check-label" for="inlineRadio1">طالب</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role" value="TRAINER">
                                    <label class="form-check-label" for="inlineRadio2">مدرب</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <input type="password" name="password" placeholder="{{__('main.password')}}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <input type="password" name="password_confirmation" placeholder="{{__('main.password_confirm')}}" class="form-control">
                            </div>
                        </div>
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-primary">تسجيل </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="row">

    <div class="col-md-12 text-center silder-text">
        <h2>الدورات </h2>
    </div>
    <div class="col-md-10 col-md-offset-1">
        <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel">
            <div class="carousel-inner">
                <div class="item active">
                    @foreach(App\Course::orderBy('created_at', 'desc')->limit(3)->get() as $course)
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
                    @foreach(App\Course::orderBy('created_at', 'desc')->limit(3)->offset(3)->get() as $course)
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
<!-- Section  for Unviersity -->
<section>
    <div class="container-rem">
        <div class="row">
            <div class="col-md-12 section-title">
                <h2>شركاء النجاح</h2>
            </div>
            <div class="col-md-12">
                <div class="col-md-8 text-center col-md-offset-2">
                    <img src="{{asset('images/kau.jpg')}}" class="" width="250px" height="250px">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- advans part -->
<section class="testimoials">
        <div class="container">
        <div class="row">
              <div class="col-md-12 section-title text-center">
                <h2 style="font-size:3.5vw">مزايا</h2>
              </div>
                    <div class="col-md-3 text-center">
                        <div class="selection-1">
                         <i class="glyphicon glyphicon-bullhorn icon" style="font-size: 30px; color: #129cf3;"></i>
                         <h3><b>التواصل</b></h3>
                         <h4>خدمة التواصل والمشاركة مع المدربين و ادارة الموقع.</h4>
                    </div>
        </div>
                    <div class="col-md-3 text-center">
                        <div class="selection-1">
                                            <i class="glyphicon glyphicon-blackboard icon" style="font-size: 30px; color: #129cf3;"></i>
                                            <h3><b>التقييم </b></h3>
                                            <h4>امكانية تقييم الدورات التدريبية واضافة تعليق عليها.</h4>
                                        </div>
                    </div>
        
                    <div class="col-md-3 text-center">
                            <div class="selection-1">
                         <i class="glyphicon glyphicon-bullhorn icon" style="font-size: 30px; color: #129cf3;"></i>
                         <h3><b>معلومات الدورة التدريبية</b></h3>
                         <h4> الاعلان ومعرفة مدة وزمان ومكان الدورة التدريبية</h4>
                    </div>
                </div>
        
                    <div class="col-md-3 text-center">
                            <div class="selection-1">
                            <i class="fas fa-question icon" style="font-size: 30px; color: #129cf3;"></i>
                            <h3><b>تقديم الاستفسارات</b></h3>
                                <h4>اتاحة تقديم الإستفسارات والأسئلة والإجابة عليها مباشرة من قبل المدربين</h4>
                            </div>
                    </div>
        
                </div>
            </div>
        <br><br>
        <br><br>
        </section>

        <section class="contactus">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                              <div style="text-align:center">
                      <div class="section-title text-center">
                        <span><h2>تواصل معنا </h2></span>
                      </div>
                              <h3>بإمكانك التواصل مع ادارة الموقع للإجابة على استفسارتك الخاصة </h3>
                          </div>
                      <div class="col-md-12">
                                  <div class="mssg">
                                  <!--	<div class="text-align">
                           <h3>نسعد بتواصلكم..</h3>
                              </div> -->
                          </div>
                      </div>
                    </div>
                    <div class="col-md-10">
                      <form class="cont">
                        <div class="col-md-6">
                          <input type="text" name="" placeholder="الاسم" class="form-control">
                        <input type="text" name="" placeholder="الايميل" class="form-control">
                        <input type="text" name="" placeholder="الموضوع" class="form-control">
                        </div>
                        <div class="col-md-6">
                                      <div class="mssg">
                          <textarea class="form-control" rows="5" placeholder="الرساله"></textarea>
                        </div>
                       <div class="text-center">
                          <input type="submit" name="" class="btn btn-info btnm" value="ارسال">
                       </div>
              </div>
                      </form>
                    </div>
                  </div>
                </div>
              </section>

@endsection