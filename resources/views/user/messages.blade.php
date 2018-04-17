@extends('user')
@section('user_content')
<div class="row col-12">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
            <form>
                <input id="search_users" type="text" name="" class="form-control for"  placeholder="الى ">
            </form>
            </div>
            <div class="panel-body text-center">
                <textarea name="area3" rows="5" style="width: 100%;"></textarea>
                <input type="submit" name="" class="btn btn-info for" value="ارسل">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default hig">
            <div class="panel-heading">
                <h3><i class="fas fa-envelope"></i> الرسائل </h3>
            </div>
            <div class="panel-body">
                @foreach($user->messages() as $message)
                <div>{{$message->title}}</div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){autocomplete(document.getElementById('search_users'))});
</script>
@endsection