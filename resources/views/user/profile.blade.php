@extends('layouts.app') @section('content')

@if($user->role == 'TRAINER')



<!-- information person -->
<section class="info">
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="col-md-3 ">
                            @if($user->trainer_data->twitter) <a href="https://www.twitter.com/{{$user->trainer_data->twitter}}"><i class="fab fa-twitter"></i><a> @endif
                            @if($user->trainer_data->instagram) <a href="https://www.instagram.com/{{$user->trainer_data->instagram}}"><i class="fab fa-instagram"></i></a> @endif
                        </div>
                        <div class="col-md-3">
                            <p><i class="fas fa-male"></i> الاسم : {{$user->name }}</p>
                        <p><i class="fas fa-pencil-alt"></i> المهنه :{{$user->trainer_data ? $user->trainer_data->occupation : ''}}</p>
                            <p><i class="fas fa-globe"></i> الجنسية : {{$user->nationality }}</p>
                        </div>
                        <div class="col-md-3">
                            <p><a href="{{url('user/'. $user->id .'/resume')}}"><i class="far fa-file-alt"></i> السيرة الذاتية </a></p>
                            <p><i class="fas fa-envelope"></i> البريد : {{$user->email}} </p>
                        </div>
                        <div class=" img-left">
                            <img src="{{url('images/man.png')}}"  width="90px" height="90px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





<!-- course -->
<section class="info">
    <div class="container">
        <div class="row">
            <div class="col-md-10 text-center silder-text"><h2>الدورات المقدمة :</h2></div>
            <div class="col-md-10 ">
                <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="myCarousel">
                    <div class="carousel-inner">
                        <div class="item active">
                            @foreach($user->courses(0,3) as $course)
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="panel panel-default">
                                    <div class="panel-header">
                                        <img src="{{$course->photo ? url($course->photo):url('images/placeholder.gif')}}" alt="silder1" class="img-responsive">
                                    </div>
                                    <div class="panel-body text-center">
                                        <a href="course_deteles.html"><p>{{$course->name}}</p></a>
                                        <a href="coach.html"> <p>{{$course->trainer->name}}</p></a>
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
                        @php $inactive_courses = $user->courses(3,21) @endphp
                        @if(count($inactive_courses) >0 )
                        <div class="item">
                            @foreach($user->courses(3,20) as $course)
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="panel panel-default">
                                    <div class="panel-header">
                                        <img src="{{$course->photo ? url($course->photo):url('images/placeholder.gif')}}" alt="silder1" class="img-responsive">
                                    </div>
                                    <div class="panel-body text-center">
                                        <a href="course_deteles.html"><p>{{$course->name}}</p></a>
                                        <a href="coach.html"> <p>{{$course->trainer->name}}</p></a>
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
                        @endif
                    </div>

                    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <br><br>
</section>








        {{-- <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 style="font-size:3.5vw">السيرة الذاتية </h3>
                    </div>
                </div>
        
                <div class="about-coutch">
                    <h3><i class="fa fa-user"></i> السيرة الذاتية</h3>
        
                    <div class="talk">
                        @if(isset($user->trainer_data)) {!!html_entity_decode($user->trainer_data->resume)!!} @endif
                    </div>
                </div>
        
                <div class="card">
                    @if(isset($user->profile_picture))
                    <img src="{{url($user->profile_picture)}}" style="width:100%">
                    @else
                    <img src="{{asset('images/man.png')}}"  style="width:100%">
                    @endif
                    <h1>{{$user->name}}</h1>
                    <h3 class="title"> معلوماتي: </h3>
                    <div class="col-md-12 text-center">
                        <h4><b>العمر : </b> {{$user->age}}</h4>
                        <h4><b>الجنسية : </b> {{$user->nationality}}</h4>
                        <h4><b>المهنة: </b> @if(isset($user->trainer_data)) {{$user->trainer_data->occupation}} @endif</h4>
        
                    </div>
                </div>
        
                <div class="atchevment">
                    <h3><i class="fa fa-tag "></i> الانجازات</h3>
                    <div class="about-coutch2">
                        @if(isset($user->trainer_data)) {!!html_entity_decode($user->trainer_data->accomplishments)!!} @endif
                    </div>
                </div>
        
                <div class="exampls">
                    <h3><i class="fa fa-tag "></i> نماذج من الأعمال</h3>
                    <div class="about-coutch3">
                        @if(isset($user->trainer_data)) {!!html_entity_decode($user->trainer_data->samples)!!} @endif
                    </div>
                </div>
            <br><br>
            </div>
        </div>
    </section> --}}

@else
<div class="col-12">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 style="margin-bottom: 10px">البيانات الشخصيه:-</h4>
        </div>
        <div class="panel-body">
            <table class="tr table">
                <tr>
                    <th> الاسم: </th>
                    <td>{{$user->name}}</td>
                    <th> العمر: </th>
                    <td>{{$user->age}}</td>
                </tr>
                <tr>
                    <th> السجل المدني: </th>
                    <td> {{$user->national_id}} </td>
                    <th> رقم الجوال :</th>
                    <td> {{$user->phone_number}}</td>
                </tr>
                <tr>
                    <th> البريد الالكترواني:</th>
                    <td>{{$user->email}}</td>
                    <th> العنوان :</th>
                    <td> {{$user->address}} </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>البيانات الاكاديمية :-</h4>
        </div>
        <div class="panel-body">
            <table class="tr table">
                <tr>
                    <th> الجامعة :</th>
                    <td> {{$user->university}} </td>
                    <th> السجل الاكاديمي: </th>
                    <td> {{$user->university_id}} </td>
                </tr>
                <tr>
                    <th> التخصص :</th>
                    <td class="td"> {{$user->major}} </td>
                    <th> المستوى :</th>
                    <td>{{$user->level}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>

@endif

@endsection