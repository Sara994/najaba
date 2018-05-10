@extends('user') @section('user_content')

@if($user->role == 'TRAINER')


<section >
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="section-title">
          <h2>السيرة الذاتية </h2>
        </div>
      </div>
      <div class="col-md-12 text-center col-md-offset-3">
        <div class="col-md-6 ">
            @if($user->profile_picture)
                <img src="{{url($user->profile_picture)}}" width="200px" height="200px">
            @else
                <img src="{{asset('/images/man.png')}}" width="200px" height="200px">
            @endif
        </div>
      </div>
      
      <div class="col-md-12 text-center">
        <h4>الاسم: {{$user->name}} </h4>
        <h4>العمر :{{$user->age}}</h4>
        <h4>السكن :{{$user->address}}</h4>
        <h4>المهنه:{{$user->major}}</h4>
      </div>

      <div class="col-md-12">
        <div class="col-md-10">
          <h3><b>السيرة الذاتية :- </b></h3>
        </div>

         <div class="col-md-10">
          <h3><b>الانجازات:- </b></h3>
        </div>

        <div class="col-md-10">
          <h3><b>نماذج من الاعمال :- </b></h3>
        </div>
      </div>
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