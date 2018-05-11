@extends('layouts.app')
@section('content')

<div class="edit-4">
    <div class="col-md-11">
        <img src="{{$user->profile_picture ? url($user->profile_picture): asset('images/man.png')}}" class="img-responsive center-block" width="100px" height="100px">
    </div>

    <div class="nm">
        <div class="text-center">
            <h2>{{$user->name}}</h2>
            <a href="{{url('/user/edit')}}" class="btn btn-info text-center bttoun">تعديل</a>
        </div>
    </div>
</div>

<section >
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="navbar navbar-light" style="background-color: #ffffff; border-color:#EAECEE">
                    <ul class="nav navbar-nav" style="display:flex;flex-direction:row">
                        <li>
                            <a href="{{url('/user/profile')}}">الملف الشخصي</a>
                        </li>
                        <li>
                            <a href="{{url('/user/courses')}}">الدورات</a>
                        </li>
                        <li>
                            <a href="{{url('/user/messages')}}">الرسائل</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-default">
                        <div class="panel panel-default">
                            @if(isset($message))
                                <div class="panel-heading">
                                    {{$message->title}}

                                    <span style="float:left">
                                        @php $sender = $message->from->id == Auth::user()->id ? $message->to: $message->from @endphp
                                        <a href="{{url('user/' . $sender->id)}}"> {{$sender->name}}</a>
                                    </span>
                                </div>
                                <div class="panel-body">
                                    {!!html_entity_decode($message->content)!!}
                                </div>
                            @else
                                <div>قم باختيار رسالة</div>
                            @endif
                        </div>
                        <div class="panel-body">
                            @if(isset($message))
                            <form method="post" action="{{url('message/reply')}}">
                                @csrf
                                <input value="{{$message->id}}" type="hidden" name="msg_id" class="form-control for"  placeholder="الى ">
                                <textarea id="replyTextArea" name="reply" rows="5" style="width: 100%;"></textarea>
                                <input type="submit" name="" class="btn btn-info for" value="ارسل">
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4 texlin">
                    <div class="panel panel-default" style="height: 400px">
                        <div class="panel-heading">
                            <span>الرسائل</span>
                            @foreach($user->messages() as $msg)
                                @if(is_null($msg->reply_to))
                                    @php $sender = $msg->from->id == Auth::user()->id ? $msg->to: $msg->from @endphp
                                    <div class="list-group-item">
                                        <a href="{{url('user/messages/'.$msg->id)}}">{{$msg->title}}</a>
                                        <div><sub><a href="{{url('user/' . $sender->id)}}"> {{$sender->name}}</a></sub></div>
                                    </div>
                                @endif
                            @endforeach
                            <div>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fas fa-plus"></i> رسائلة جديدة </button>
                            </div>
                        </div>
                        <div class="panel-body"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
  
  
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">رسالة جديدة</h4>
            </div>
            <div class="modal-body">
                <div class="panel-body">
                    <form method="post" action="{{url('message')}}">
                        @csrf
                        <div>
                            <input autocomplete="off" type="text" name="title" class="form-control for"  placeholder="عنوان الرسالة">
                            <input autocomplete="off" id="search_users" type="text" class="form-control for"  placeholder="الى ">
                            <input id="search_user_id" type="hidden" name="to_id" class="form-control for"  placeholder="الى ">
                        </div>
                        <textarea id="contentTextArea" name="content" rows="5" style="width: 700px; height: 300px"></textarea>
                        <input type="submit" name="" class="btn btn-info for" value="ارسل">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
  

{{-- <div class="row col-12">
    <div class="col-md-8">
        <div class="panel panel-default">
            @if(isset($message))
                <div class="panel-heading">
                    {{$message->title}}
                </div>
                <div class="panel-body">
                    {!!html_entity_decode($message->content)!!}
                </div>
            @else
                <div>قم باختيار رسالة</div>
            @endif
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                رسالة جديدة
            </div>
            <div class="panel-body">
                <form method="post" action="{{url('message')}}">
                    @csrf
                    <div>
                        <input autocomplete="off" type="text" name="title" class="form-control for"  placeholder="عنوان الرسالة">
                        <input autocomplete="off" id="search_users" type="text" class="form-control for"  placeholder="الى ">
                        <input id="search_user_id" type="hidden" name="to_id" class="form-control for"  placeholder="الى ">
                    </div>
                    <textarea id="contentTextArea" name="content" rows="5" style="width: 100%;"></textarea>
                    <input type="submit" name="" class="btn btn-info for" value="ارسل">
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default hig">
            <div class="panel-heading">
                <h4><i class="fas fa-envelope"></i> الرسائل </h4>
            </div>
            <div class="panel-body">
                @foreach($user->messages() as $msg)
                    <div class="list-group-item">
                        <a href="{{url('user/messages/'.$msg->id)}}">{{$msg->title}}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div> --}}

<script>
    $(document).ready(function(){autocomplete(document.getElementById('search_users'),'search_user_id')});
    let contentTextArea = new nicEditor({fullPanel : true}).panelInstance('contentTextArea',{hasPanel : true});
    let replyTextArea = new nicEditor({fullPanel : true}).panelInstance('replyTextArea',{hasPanel : true});
</script>
@endsection