@extends('user') @section('user_content')

@if($user->role == 'TRAINER')

<section>
        <div class="container">
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
    </section>

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