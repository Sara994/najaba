@extends('course.view')
@section('course_content')
    <div class="col-md-8">
        <div class="row">
        @if(isset($course->files))
            @foreach ($course->files as $file)
                <div class="col col-6 card">
                    <a href="{{ url($file->path) }}">{{$file->filename}}</a>
                </div>
            @endforeach
        @endif
        </div>
        @guest
        @else
            @if($course->trainer_id == Auth::user()->id)
                <div class="card">
                    <form method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input multiple="true" type="file" class="form-control-file" name="photos[]" >
                        </div>
                        <div class="form-group">
                            <button class="btn btn-default" type="submit">رفع</button>
                        </div>
                    </form>
                </div>
            @endif
        @endguest
    </div>
@endsection