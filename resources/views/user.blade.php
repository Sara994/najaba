@extends('layouts.app')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="navbar navbar-default">
                    <ul class="nav navbar-nav" style="display:flex;flex-direction:row;flex:1;align-content:center">
                        <li><a href="{{url('user/'. $id .'/profile')}}">الملف الشخصي</a></li>
                        <li><a href="{{url('user/'. $id .'/courses')}}">الدورات</a></li>
                        <li style="flex:1"><a href="{{url('user/'. $id .'/messages')}}">الرسائل</a></li>
                        @if (null !== Auth::user() && $id == Auth::user()->id)
                        <li style="align-self:center"><button class="btn btn-success btn-block"><a href="{{url('user/edit')}}" style="color:inherit;text-decoration:none">تعديل</a></button></li>
                        
                        @if(Auth::user()->role == 'TRAINER')<li style="align-self:center;margin:0 10px"><button class="btn btn-success btn-block"><a href="{{url('user/editresume')}}" style="color:inherit;text-decoration:none">تعديل السيرة الذاتية</a></button></li>@endif

                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            @yield('user_content')
            <!-- <div class="col-md-8">

            </div> -->
        </div>
    </div>
</section>
@endsection