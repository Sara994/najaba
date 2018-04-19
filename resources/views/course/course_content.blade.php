@extends('course.view')
@section('course_content')
    <div class="col-md-8">
        {!!html_entity_decode($course->content)!!}
    </div>
@endsection