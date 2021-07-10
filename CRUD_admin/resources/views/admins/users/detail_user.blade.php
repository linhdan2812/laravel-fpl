@extends('admins.index')
@section('content')
<div class="row ">
    <div class="col-3 bg bg-light">
        <img src="{{asset('images/user_img.png')}}" class="img-thumbnail" alt="...">
    </div>
    <div class="col-9 bg bg-light">
        <h1>Full Name: {{$detail_user->name}}</h1>
        <h4>Date of birth: {{$detail_user->date_of_birth}}</h4>
        <h4>Gender: @if (($detail_user->gender) === 1)
            male
            @elseif (($detail_user->gender) === 0)
            Female
            @else
            Other
            @endif</h4>
        <h4>Email: {{$detail_user->email}}</h4>
        <h4>Phone: {{$detail_user->phone}}</h4>
    </div>
</div>
@endsection