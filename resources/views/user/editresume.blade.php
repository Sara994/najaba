@extends('layouts.app')
@section('content')

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

@endsection