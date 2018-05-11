@extends('layouts.app')
@section('content')
@if($user->role == 'STUDENT')
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
                        <input type="number" name="age" value="{{$user->age}}" class="form-control" placeholder="العمر">
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
                        <input type="text" name="nationality" value="{{$user->nationality}}" class="form-control" placeholder="الجنسية">
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
                        @if($user->profile_picture)
                        <img style="max-height:100px" src="{{asset($user->profile_picture)}}" >
                        @endif
                    </div>
                </div>
                <div class="col-md-7">
                    <input type="submit" name="submit" class="btn btn-success btn-block" value="حفظ">
                </div>
            {{Form::close()}}
        </div>
    </div>
</div>

@else



<section>
        <div class="container">
                  <div class="edit">
          <div class="row">
                  <div class="info-i">
            <div class="col-md-10">
              <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('user/edit') }}">
                <h4>البيانات الشخصية </h4>
                <div class="col-md-10">
      
                  <div class="col-md-6 col-pad">
                    <input type="text" value="{{$user->name}}" name="name" class="form-control" placeholder="الاسم">
      
                  </div>
                  <div class="col-md-6 col-pad">
                    <input type="text" value="{{$user->trainer_data->occupation}}" name="occupation" class="form-control" placeholder="المهنه">
                  </div>
                              <br><br>
                </div>
      
                 <div class="col-md-10">
      
                  <div class="col-md-6 col-pad">
                    <input type="text" value="{{$user->nationality}}" name="nationality" class="form-control" placeholder="الجنسية">
      
                  </div>
                   <div class="col-md-6 col-pad">
                    <input type="text" value="{{$user->email}}" name="email" class="form-control" placeholder=" البريد">
                  </div>
      
                </div>
                
                <div class="col-md-10">
                   <h4>التواصل الاجتماعي </h4>
                  <div class="col-md-6 col-pad">
                    <input type="text" value="{{$user->trainer_data->twitter}}" name="twitter" class="form-control" placeholder="Twitter">
                  </div>
                  <div class="col-md-6 col-pad">
                    <input type="text" name="instagram" value="{{$user->trainer_data->instagram}}" class="form-control" placeholder="Instagram">
                  </div>
                </div>
                <div class="col-md-10">
                  <h4 > الصورة الشخصيه</h4>
                  <div class="col-md-6 col-pad">
                    <input type="file" name="profile_picture" class="form-control" placeholder="الصورة الشخصية">
      
                  </div>
      
                </div>
      
      
                    <div class="col-md-10">
                                      <h4 > السيرة الذاتية</h4>
                                      <div class="col-md-12 col-pad">
                                        <textarea id="resume" name="resume" class="form-control" rows="5">
                                            {!! html_entity_decoder($user->trainer_data->resume) !!}}
                                        </textarea>
      
                                      </div>
      
                                    </div>
      
                                    <div class="col-md-10">
                                      <h4 >الانجازات</h4>
                                      <div class="col-md-12 col-pad">
                                        <textarea id="accomplishments" name="accomplishments" class="form-control" rows="5">
                                            {!! html_entity_decoder($user->trainer_data->accomplishments) !!}}
                                        </textarea>
      
                                      </div>
      
                                    </div>
      
                                    <div class="col-md-10">
                                      <h4 >نماذج الاعمال </h4>
                                      <div class="col-md-12 col-pad">
                                        <textarea id="samples" name="samples" class="form-control" rows="5">
                                            {!! html_entity_decoder($user->trainer_data->samples) !!}}
                                        </textarea>
                                      </div>
                                    </div>
                                <div class="col-md-10">
                               <br><br>
                   <input type="submit" name="" class="btn btn-success btn-block" value="حفظ">
                 </div>
              </form>
            </div>
              </div>
          </div>
          </div>
        </div>
          <br><br>
          <br><br>
    </section>

    <script>
        let accomplishmentsTA = new nicEditor({fullPanel : true}).panelInstance('accomplishments',{hasPanel : true});
        let samplesTA = new nicEditor({fullPanel : true}).panelInstance('samples',{hasPanel : true});
        let resumeTA = new nicEditor({fullPanel : true}).panelInstance('resume',{hasPanel : true});
    </script>


@endif

@endsection