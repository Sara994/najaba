@extends('course.view')
@section('course_content')
<div class="col-md-12">
    @foreach($course->comments() as $comment)
    <div class="row card" style="margin:5px;" >
        <div style="display:flex;align-items:center;">
            <div>
                @if($comment->poster()->profile_picture)
                    <img src="{{url($comment->poster()->profile_picture)}}"  class="img-responsive" style="max-height:80px;max-width:80px">
                @else
                    <img src="{{asset('images/man.png')}}"  class="img-responsive" style="max-height:80px;max-width:80px">
                @endif
            </div>
            <div><h4>{{$comment->poster()->name}}</h4></div>
        </div>
        <div >
            
            <div >
                <div class="text-commnt">
                    <p>{!!html_entity_decode($comment->comment)!!}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @guest
    @else
    <form style="padding-top:50px" method="post" action="{{url('course/'. $id . '/comments')}}">
        @csrf
        <input type="hidden" name="course_id" value="{{$id}}" >
        <div>
            <textarea name="comment" style="width:100%"></textarea>
        </div>
        <input type="submit" value="Save">
    </form>
    @endguest
</div>
@endsection