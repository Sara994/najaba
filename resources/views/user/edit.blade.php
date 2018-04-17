@extends('user') @section('user_content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <!-- <form class="form-horizontal" method="post" action="{{url('user/edit')}}" enctype="multipart/form-data"> -->
            {{ Form::open(array('url' => 'user/edit', 'files' => true)) }}
                @csrf
                <h4>البيانات الشخصية </h4>
                <div class="col-md-7">
                    <div class="col-md-6 col-pad">
                        <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="{{__('main.name')}}">
                    </div>
                    <div class="col-md-6 col-pad">
                        <input type="text" name="age" value="{{$user->age}}" class="form-control" placeholder="العمر">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="col-md-6 col-pad">
                        <input type="text" name="national_id" value="{{$user->national_id}}" class="form-control" placeholder="السجل المدني">
                    </div>
                    <div class="col-md-6 col-pad">
                        <input type="text" name="phone_number" value="{{$user->phone_number}}" class="form-control" placeholder="رقم الجوال">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="col-md-6 col-pad">
                        <input type="text" name="address" value="{{$user->address}}" class="form-control" placeholder="العنوان">
                    </div>
                    <div class="col-md-6 col-pad">
                        <input type="text" name="email" value="{{$user->email}}" class="form-control" placeholder="{{__('main.email')}}">
                    </div>
                </div>
                <div class="col-md-7">
                    <h4>البيانات الاكاديمية</h4>
                    <div class="col-md-6 col-pad">
                        <input type="text" name="university" value="{{$user->university}}" class="form-control" placeholder="الجامعة">
                    </div>
                    <div class="col-md-6 col-pad">
                        <input type="text" name="university_id" value="{{$user->university_id}}" class="form-control" placeholder="الرقم الجامعي">
                    </div>
                </div>
                <div class="col-md-7 col-pad">
                    <div class="col-md-6 col-pad">
                        <input type="text" name="major" value="{{$user->major}}" class="form-control" placeholder="التخصص">
                    </div>
                    <div class="col-md-6 col-pad">
                        <input type="text" name="level" value="{{$user->level}}" class="form-control" placeholder="المستوى">
                    </div>
                </div>
                <div class="col-md-7">
                    <h4> الصورة الشخصيه</h4>
                    <div class="col-md-6 col-pad">
                        <input type="file" name="profile_picture" class="form-control" placeholder="الصورة الشخصية">
                    </div>
                    <div>
                        <img src="{{asset($user->profile_picture)}}" >
                    </div>
                </div>
                <div class="col-md-7">
                    <input type="submit" name="submit" class="btn btn-success btn-block" value="حفظ">
                </div>
            {{Form::close()}}
        </div>
    </div>
</div>

@endsection