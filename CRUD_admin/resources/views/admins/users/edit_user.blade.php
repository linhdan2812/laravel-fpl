@extends('admins.index')
@section('content')
<h1 class="text-center">Edit User</h1>
<div class="container">
    <form action="{{route('user.update', $user->id)}}" method="GET">
        <!-- @csrf -->
        {{ csrf_field() }}
        <!-- name -->
        <div class="mb-3">
            <label for="nameUser" class="form-label">Name of User</label>
            <input type="text" class="form-control" id="nameUser" name="name" value="{{$user->name}}">
        </div>
        <!-- gender -->
        <label for="nameUser" class="form-label">Gender</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" value="1">
            <label class="form-check-label" for="flexRadioDefault1">
                Nam
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="0">
            <label class="form-check-label" for="flexRadioDefault2">
                Nữ
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault3" value="2">
            <label class="form-check-label" for="flexRadioDefault2">
                Khác
            </label>
        </div>
        <!-- date of birth -->
        <div class="mb-3">
            <label for="nameUser" class="form-label">Date of birth</label>
            <input type="date" class="form-control" id="nameUser" name="date_of_birth" value="{{$user->date_of_birth}}">
        </div>
        <!-- email -->
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" value="{{$user->email}}" name="email">
        </div>
        <!-- phone number -->
        <div class="mb-3">
            <label for="nameUser" class="form-label">Phone number</label>
            <input type="text" class="form-control" id="nameUser" name="phone" value="{{$user->phone}}">
        </div>
        <!-- password -->
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection