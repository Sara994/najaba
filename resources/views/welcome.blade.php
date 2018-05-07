@extends('layouts.app') @section('content')

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
                </div>

                <div class="item">
                    @foreach(App\Course::orderBy('created_at', 'desc')->limit(3)->offset(3)->get() as $course)
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
                                    <p>{{$course->name}}</p>
                                </div>
                            </div>
                        </a>
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
<section class="ima-back">
    <<div class="row">
      <div class="col-md-12 section-title text-center">
        <h2>مزايا</h2>
      </div>
    </div>
  <section class="testimoials" style="margin-top: 20px; margin-bottom: 20px;" >
    
  <div class="testimoials-overlay">
    <div class="container">
      <div class="row">
        <div class="col-md-10 ">
          <div id="carousel-testimoials" class="carousel slide" data-ride="carousel">
            <!-- indicators -->
            <ol class="carousel-indicators " style="padding-right: 160px">
                         <li data-target="#carousel-testimoials" data-slide-to="0" class="active"></li>
                         <li data-target="#carousel-testimoials" data-slide-to="1"></li>
                         <li data-target="#carousel-testimoials" data-slide-to="2"></li>
                         <li data-target="#carousel-testimoials" data-slide-to="3"></li>

                        </ol>

                        <!-- wrapper for slides -->
                        <div class="carousel-inner">
                          <!-- Add the first item -->
                          <div class="item active text-center">
                             <i class=" glyphicon glyphicon-comment" style="font-size: 80px; color: #129cf3;"></i>
                            <div class="testimoials-caption text-center">
                              <h2>خدمة التواصل والمشاركة مع المدربين و ادارة الموقع.</h2>
                              
                            </div>
                          </div>

                           <!-- Add the second item -->
                          <div class="item  text-center">
                           <i class="glyphicon glyphicon-blackboard" style="font-size: 80px; color: #129cf3;"></i>
                            <div class="testimoials-caption text-center">
                              <h2>امكانية تقييم الدورات التدريبية واضافة تعليق عليها.</h2>
                              
                            </div>
                          </div>




                          <!-- Add the Threeth item -->
                          <div class="item  text-center">
                            <i class="glyphicon glyphicon-bullhorn"  style="font-size: 80px; color: #129cf3;"></i>
                            <div class="testimoials-caption text-center">
                              <h2>لاعلان ومعرفة مدة وزمان ومكان الدورة التدريبية</h2>
                              
                            </div>
                          </div>

                          <div class="item  text-center">
                           <i class="fas fa-question" style="font-size: 80px; color: #129cf3;"></i>
                            <div class="testimoials-caption text-center">
                              <h2>اتاحة تقديم الاستفسارات والأسئلة والإجابة عليها مباشرة من المدربين ة</h2>
                            
                            </div>
                          </div>



                        </div>


                    </div>

                  </div>

                       

      </div>
    </div>
  </div>
    
  
</section>

</section>

<section class="contactus">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-title text-center">
          <h2>تواصل معنا </h2>
         
        </div>
        <div class="col-md-12">
          <div class="text-center">
             <p>نسعد بتواصلكم..</p>
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
            <textarea style="background-color:#FFF" class="form-control" rows="5" placeholder="الرساله"></textarea>
          </div>
         <div class="text-center">
            <input type="submit" name="" class="btn btn-info btnm" value="ارسال">
         </div>
        </form>
      </div>
    </div>
  </div>
</section>

@endsection