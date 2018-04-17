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
                                <input type="text" value="Abdulrahman" name="name" placeholder="{{__('main.name')}}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <input type="email" value="aaa@aaa.com" name="email" placeholder="{{__('main.email')}}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3">
                                <label>المهنه :</label>
                            </div>
                            <div class="col-md-3 col-md-offset-1">
                                <label>طالب</label>
                                <input type="radio" checked="checked" name="role" value="STUDENT" class="form-control">
                                <label>مدرب</label>
                                <input type="radio" name="role" value="TRAINER" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <input type="password" value="123123123" name="password" placeholder="{{__('main.password')}}" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-2">
                                <input type="password" value="123123123" name="password_confirmation" placeholder="{{__('main.password_confirm')}}" class="form-control">
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
                <!--<div class="container">
                <div class="row">-->
                <div class="item active">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="#">
                            <div class="panel panel-default">
                                <div class="panel-header">
                                    <img src="{{asset('images/lecu1.jpg')}}" alt="silder1" class="img-responsive">

                                </div>
                                <div class="panel-body text-center">

                                    <p> دورة ادارة المشاريع</p>

                                    <!-- <div><span>المدرب</span><p>احمد </p></div>-->

                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="#">

                            <div class="panel panel-default">
                                <div class="panel-header">
                                    <img src="{{asset('images/lecu2.jpg')}}" alt="silder1" class="img-responsive">
                                </div>
                                <div class="panel-body text-center">

                                    <p> دورة تعليم اكواد</p>

                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="#">
                            <div class="panel panel-default">
                                <div class="panel-header">
                                    <img src="{{asset('images/lecu3.jpg')}}" alt="silder1" class="img-responsive">

                                </div>
                                <div class="panel-body text-center">

                                    <p> دورة تعلم اللغة اليابانية</p>

                                </div>
                            </div>
                        </a>
                    </div>
                    <!--Anther silder -->

                </div>

                <div class="item">

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="#">
                            <div class="panel panel-default">
                                <div class="panel-header">
                                    <img src="{{asset('images/lecu4.jpg')}}" alt="silder1" class="img-responsive">

                                </div>
                                <div class="panel-body text-center">

                                    <p> الادب السردي</p>

                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="#">
                            <div class="panel panel-default">
                                <div class="panel-header">
                                    <img src="{{asset('images/lecu5.jpg')}}" alt="silder1" class="img-responsive">

                                </div>
                                <div class="panel-body text-center">

                                    <p>شرح حقوق العمل وواجبات العمال</p>

                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="course_deteles.html">
                            <div class="panel panel-default">
                                <div class="panel-header">
                                    <img src="{{asset('images/lecu6.jpg')}}" alt="silder1" class="img-responsive">

                                </div>
                                <div class="panel-body text-center">

                                    <p>كتابة التقارير الاعلامية</p>

                                </div>
                            </div>
                        </a>
                    </div>

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
            <div class="img-col">
                <div class="col-md-8 text-center col-md-offset-2">
                    <img src="{{asset('images/kau.jpg')}}" class="" width="250px" height="250px">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- advans part -->
<section class="ima-back">
    <div class="container-rem">
        <div class="row">
            <div class="col-md-12 section-title text-center">
                <h2>مزايا</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="icon-left">
                    <i class=" glyphicon glyphicon-comment"></i>
                </div>
                <div class="subject">
                    <h4>خدمة التواصل والمشاركة مع المدربين و ادارة الموقع.</h4>
                </div>
                <div class="icon-left">
                    <i class="glyphicon glyphicon-blackboard"></i>
                </div>
                <div class="subject">
                    <h4>امكانية تقييم الدورات التدريبية واضافة تعليق عليها.</h4>
                </div>
            </div>
            <div class="col-md-6">
                <div class="icon-right">
                    <i class="glyphicon glyphicon-bullhorn"></i>
                </div>
                <div class="subject">
                    <h4> الاعلان ومعرفة مدة وزمان ومكان الدورة التدريبية</h4>
                </div>
                <div class="icon-right">
                    <i class="fas fa-question"></i>
                </div>
                <div class="subject">
                    <h4>اتاحة تقديم الاستفسارات والأسئلة والإجابة عليها مباشرة من المدربين ة</h4>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection