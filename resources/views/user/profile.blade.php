@extends('user') @section('user_content')
<div class="col-12">
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 style="margin-bottom: 10px">البيانات الشخصيه:-</h4>
    </div>
    <div class="panel-body">
        <table class="tr table">
            <tr>
                <th> الاسم: </th>
                <td>{{$user->name}}</td>
                <th> العمر: </th>
                <td>{{$user->age}}</td>
            </tr>
            <tr>
                <th> السجل المدني: </th>
                <td> {{$user->national_id}} </td>
                <th> رقم الجوال :</th>
                <td> {{$user->phone_number}}</td>
            </tr>
            <tr>
                <th> البريد الالكترواني:</th>
                <td>{{$user->email}}</td>
                <th> العنوان :</th>
                <td> {{$user->address}} </td>
            </tr>
        </table>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h4>البيانات الاكاديمية :-</h4>
    </div>
    <div class="panel-body">
        <table class="tr table">
            <tr>
                <th> الجامعة :</th>
                <td> {{$user->university}} </td>
                <th> السجل الاكاديمي: </th>
                <td> {{$user->university_id}} </td>
            </tr>
            <tr>
                <th> التخصص :</th>
                <td class="td"> {{$user->major}} </td>
                <th> المستوى :</th>
                <td>{{$user->level}}</td>
            </tr>
        </table>
    </div>
</div>
</div>
@endsection