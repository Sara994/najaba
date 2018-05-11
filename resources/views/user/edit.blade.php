@extends('user') @section('user_content')
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

<section class="courseform">
        <div class="container">
            <div class="edit-2 body">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="text-center section-title">
                            <h2>تعديل البيانات الأكاديمية</h2>
                        </div>
                    </div>
                    <div class="col-md-11">
                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('user/resume') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="occupation" class="col-md-4 col-form-label text-md-right">المهنة</label>
    
                                <div class="col-md-6">
                                    <input value="{{$user->trainer_data ? $user->trainer_data->occupation :''}}" id="occupation" type="text" class="form-control{{ $errors->has('occupation') ? ' is-invalid' : '' }}" name="occupation" value="{{ old('occupation') }}" required autofocus>
    
                                    @if ($errors->has('occupation'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('occupation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-7">
                                <h4>التواصل الاجتماعي</h4>
                                <div class="col-md-6 col-pad">
                                    <input type="text" name="twitter" value="{{$user->trainer_data}}" class="form-control" placeholder="Twitter">
                                </div>
                                <div class="col-md-6 col-pad">
                                    <input type="text" name="instagram" value="{{$user->trainer_data}}" class="form-control" placeholder="Instagram">
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="resume" class="col-md-4 col-form-label text-md-right">السيرة الذاتية</label>
    
                                <div class="col-md-8">
                                    <textarea rows="10" id="resume" class="form-control{{ $errors->has('resume') ? ' is-invalid' : '' }}" name="resume" value="{{ old('resume') }}">
                                            {!! html_entity_decode($user->trainer_data ? $user->trainer_data->resume :'') !!}
                                    </textarea>
    
                                    @if ($errors->has('resume'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('resume') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="accomplishments" class="col-md-4 col-form-label text-md-right">الانجازات</label>
    
                                <div class="col-md-8">
                                    <textarea rows="10" id="accomplishments" class="form-control{{ $errors->has('accomplishments') ? ' is-invalid' : '' }}" name="accomplishments" value="{{ old('accomplishments') }}">
                                        {!! html_entity_decode($user->trainer_data ? $user->trainer_data->accomplishments :'') !!}
                                    </textarea>
    
                                    @if ($errors->has('accomplishments'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('accomplishments') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="samples" class="col-md-4 col-form-label text-md-right">نماذج من الأعمال</label>
    
                                <div class="col-md-8">
                                    <textarea rows="10" id="samples" class="form-control{{ $errors->has('samples') ? ' is-invalid' : '' }}" name="samples" value="{{ old('samples') }}">
                                            {!! html_entity_decode($user->trainer_data ? $user->trainer_data->samples :'') !!}
                                    </textarea>
    
                                    @if ($errors->has('samples'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('samples') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('main.save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        let accomplishmentsTA = new nicEditor({fullPanel : true}).panelInstance('accomplishments',{hasPanel : true});
        let samplesTA = new nicEditor({fullPanel : true}).panelInstance('samples',{hasPanel : true});
        let resumeTA = new nicEditor({fullPanel : true}).panelInstance('resume',{hasPanel : true});
    </script>


@endif

@endsection