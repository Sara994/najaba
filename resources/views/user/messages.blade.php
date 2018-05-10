@extends('user')
@section('user_content')
<div class="row col-12">
    <div class="col-md-8">
        <div class="panel panel-default">
            @if(isset($message))
                <div class="panel-heading">
                    {{$message->title}}
                </div>
                <div class="panel-body">
                    {{$message->content}}
                </div>
            @else
                <div>No Selected Message</div>
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
</div>

<script>
    $(document).ready(function(){autocomplete(document.getElementById('search_users'),'search_user_id')});
    let contentTextArea = new nicEditor({fullPanel : true}).panelInstance('contentTextArea',{hasPanel : true});

</script>
@endsection