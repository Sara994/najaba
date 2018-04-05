@extends('layouts.app')

@section('content')
    <form action="{{ url('course/create') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

        <input type="text" name="name">
        <input type="text" name="teacher_name">
        <input type="submit" value="Save" >
    </form>
@endsection