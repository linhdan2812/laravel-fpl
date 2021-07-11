@extends('admins.dashboard')
@section('content')
<h1 class="mt-5 mb-5 ">Edit Active User</h1>
<form action="{{route('admin.user.postEdit', $user->id)}}" method="post">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">User Name</label>
        <input type="email" class="form-control" id="exampleInputEmail1" value="{{$user->username}}" readonly>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Email</label>
        <input type="text" class="form-control" id="exampleInputPassword1" value="{{$user->email}}" readonly>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Phone</label>
        <input type="text" class="form-control" id="exampleInputPassword1" value="{{$user->phone}}" readonly>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="active" id="inlineRadio1" value="0"
            {{  ($user->active == 0 ? ' checked' : '') }}>
        <label class="form-check-label" for="inlineRadio1">Not Active</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="active" id="inlineRadio2" value="1"
            {{  ($user->active == 1 ? ' checked' : '') }}>
        <label class="form-check-label" for="inlineRadio2">Active</label>
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>

</form>

@endsection