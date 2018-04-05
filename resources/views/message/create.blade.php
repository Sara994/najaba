@extends('layouts.app')

@section('content')
    {!! Form::open() !!}
    <!-- <form method="POST" class="form-horizontal"> -->
            {{ csrf_field() }}

    <div>
        {{ Form::label('title', null, ['class' => 'control-label']) }}
        {{ Form::text('title', null,null, null ) }}
    </div>
    <div>
        {{ Form::label('Content', null, ['class' => 'control-label']) }}
        {{ Form::textarea('content', null,null, null ) }}
    </div>
    <!-- <input type="hidden" name="student_id" value="1">
    <input type="hidden" name="trainer_id" value="1"> -->
    <div>
        {{Form::submit('Save')}}
    </div>
    <!-- </form> -->
    {{!! Form::close() !!}}
@endsection