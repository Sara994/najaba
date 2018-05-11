<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>نجابة</title>

    <!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">


    <!--Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tajawal">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=El+Messiri">
    
    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/css.css')}}">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.7.1/slick-theme.min.css">
    <!-- Font Awesom -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>


    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.4.0/css/bootstrap-flipped.css">
    <script type="text/javascript" src="{{asset('/js/nicEdit-latest.js')}}"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script type="text/javascript" src="{{ asset('/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/custom.js') }}"></script>
    {{-- <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script> --}}
</head>
<body class="body" style="display:flex;flex-direction:column;min-height:100vh">
    <header>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
                <div class="container">
                    <ul class="nav navbar-nav ">
                        <!-- <li> <img src="../images/logo.png" class="logo-nav text-center"></li>-->
                        <li><a href="{{url('/')}}">الصفحة الرئيسية </a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">الدورات
                            </a>
                            <ul class="dropdown-menu">
                                @if(Auth::user() && Auth::user()->role == 'TRAINER')
                                <li><a href="/course/create">{{__('main.add_new_course')}}</a></li>
                                @endif
                                <li><a href="{{url('/course/latest')}}">دورات جديدة</a></li>
                                <li><a href="{{url('/course/category/1')}}">التربية والتعليم </a></li>
                                <li><a href="{{url('/course/category/2')}}">العلوم</a></li>
                                <li><a href="{{url('/course/category/3')}}">التقنية والتكنولوجيا </a></li>
                                <li><a href="{{url('/course/category/4')}}">الثقافة والفن </a></li>
                                <li><a href="{{url('/course/category/5')}}">الطب </a></li>
                                <li><a href="{{url('/course/category/6')}}">الهندسة </a></li>
                                <li><a href="{{url('/course/category/7')}}">العلوم الاجتماعية </a></li>
                                <li><a href="{{url('/course/category/8')}}">الاقتصاد والادارة </a></li>
                                <li><a href="{{url('/course/category/9')}}">علوم الشريعة </a></li>
                            </ul>
                        </li>
                        <!-- <li><a href="#">تصنيف</a></li>-->
                        <li><a href="{{url('/aboutus')}}">عن نجابة</a></li>
                    </ul>
                    <div style="flex:1"></div>

                    <div style="display:flex;align-items:center" class="collapse-rem navbar-collapse-rem" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->

                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <div class="navbar-form navbar-right">
                            <form method="post" action="{{url('/course/search')}}">
                                @csrf
                                <div class="form-group">
                                    <input name="needle" type="text" class="form-control" placeholder="بحث">
                                </div>
                                <button type="submit" class="btn btn-default">بحث</button>
                            </form>
                        </div>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                {{-- <li><a class="nav-link" href="{{ route('login') }}">{{ __('main.login') }}</a></li>
                                <li><a class="nav-link" href="{{ route('register') }}">{{ __('main.register') }}</a></li> --}}
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} 
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{url('/user/profile')}}">الملف الشخصي</a>
                                        <a class="dropdown-item" href="{{url('/user/edit')}}">إعدادات</a>
                                        <a class="dropdown-item" href="{{url('/user/courses')}}">الدورات</a>
                                        <a class="dropdown-item" href="{{url('/user/messages')}}">الرسائل</a>

                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                            {{ __('main.logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <section style="flex:1">
        <div class="container-rem">
            @yield('content')
        </div>
    </section>
    <section class="footer">
        <div class="container">
            <div class="row">
            <div class="col-md-4 ">
                <div class="links">
                <h4><a href="{{url('contactus')}}">تواصل معنا </a></h4>
                <h4><a href="{{url('faq')}}">اسئلة الشائعة </a></h4>
                </div>
            
            </div>
            <div class="col-md-4">
                <div class="scoil">
                <ul>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-snapchat"></i></a></li>
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                </ul>
                </div>
            </div>

            <div class="col-md-4 flor">
                <img src="{{asset('images/footor.png')}}" class="img-responsive" width="250px" height="250px">
            </div>
            </div>
        </div>
    </section>
</body>
</html>
