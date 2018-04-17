@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Course</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('course/create') }}">
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
                            <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('main.photo') }}</label>

                            <div class="col-md-6">
                                <input id="photo" type="file" class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}" name="photo" value="{{ old('photo') }}" required autofocus>

                                @if ($errors->has('photo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('photo') }}</strong>
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
</div>
@endsection