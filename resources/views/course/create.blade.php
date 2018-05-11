{{-- @extends('layouts.app') --}}
@extends('user')
{{-- @section('content') --}}
@section('user_content')


<section class="courseform">
    <div class="container">
        <div class="edit-2 body">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="text-center section-title">
                        <h2 >اضافة دورة جديدة </h2>
                    </div>
                </div>
                <div class="col-md-11">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ url('course/create') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('main.name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 col-form-label text-md-right">تخصص الدورة </label>
                            <div class="col-md-6">
                                <select name="category" class="form-control">
                                    <option value="1">التربية والتعليم </option>
                                    <option value="2">العلوم</option>
                                    <option value="3">التقنية والتكنولوجيا </option>
                                    <option value="4">الثقافة والفن </option>
                                    <option value="5">الطب </option>
                                    <option value="6">الهندسة </option>
                                    <option value="7">العلوم الاجتماعية </option>
                                    <option value="8">الاقتصاد والادارة </option>
                                    <option value="9">علوم الشريعة </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('main.location') }}</label>

                            <div class="col-md-6">
                                <input id="location" type="text" class="form-control{{ $errors->has('location') ? ' is-invalid' : '' }}" name="location" value="{{ old('location') }}" required autofocus>

                                @if ($errors->has('location'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('location') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="duration" class="col-md-4 col-form-label text-md-right">{{ __('main.duration') }}</label>

                            <div class="col-md-6">
                                <input id="duration" type="text" class="form-control{{ $errors->has('duration') ? ' is-invalid' : '' }}" name="duration" value="{{ old('duration') }}" required autofocus>

                                @if ($errors->has('duration'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('duration') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="time" class="col-md-4 col-form-label text-md-right">{{ __('main.time') }}</label>

                            <div class="col-md-6">
                                <input id="time" type="text" class="form-control{{ $errors->has('time') ? ' is-invalid' : '' }}" name="time" value="{{ old('time') }}" required autofocus>

                                @if ($errors->has('time'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('time') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="number_of_seats" class="col-md-4 col-form-label text-md-right">{{ __('main.number_of_seats') }}</label>

                            <div class="col-md-6">
                                <input id="number_of_seats" type="number" class="form-control{{ $errors->has('number_of_seats') ? ' is-invalid' : '' }}" name="number_of_seats" value="{{ old('number_of_seats') }}" required autofocus>

                                @if ($errors->has('number_of_seats'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('number_of_seats') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="intro_video" class="col-md-4 col-form-label text-md-right">{{ __('main.intro_video') }}</label>

                            <div class="col-md-6">
                                <input pattern="(http(s)?:\/\/)?((w){3}.)?youtube?(\.com)?\/.+v=(.*)" placeholder="https://www.youtube.com/watch?v=" id="intro_video" type="text" class="form-control{{ $errors->has('intro_video') ? ' is-invalid' : '' }}" name="intro_video" value="{{ old('intro_video') }}" autofocus>

                                @if ($errors->has('intro_video'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('intro_video') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="photo" class="col-md-4 col-form-label text-md-right">غلاف الدورة</label>

                            <div class="col-md-6">
                                <input id="photo" type="file" class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" name="photo" value="{{ old('photo') }}" autofocus>

                                @if ($errors->has('photo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('main.description') }}</label>

                            <div class="col-md-8">
                                <textarea rows="10" id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}"></textarea>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('main.content') }}</label>

                            <div class="col-md-8">
                                <textarea rows="10" id="content" type="file" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}" name="content" value="{{ old('content') }}" ></textarea>

                                @if ($errors->has('content'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('content') }}</strong>
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
    let descriptionTA = new nicEditor({fullPanel : true}).panelInstance('content',{hasPanel : true});
    let contentTA = new nicEditor({fullPanel : true}).panelInstance('description',{hasPanel : true});
</script>
@endsection