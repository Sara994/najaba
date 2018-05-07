@extends('course.view')
@section('course_content')
    <div class="col-md-8">
        <form method="post" enctype="multipart/form-data">
            @csrf
            <input multiple="true" type="file" name="photos[]" >
            <input type="text" name="test" value="Nothing" />
            <input type="submit" value="Save">
        </form>

        @if(isset($course->files))
            @foreach ($course->files as $file)
                {{$file->path}}
            @endforeach
        @endif
    </div>
@endsection