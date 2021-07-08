@extends('admins.index')
@section('content')
<h1 class="text-center">Add New User</h1>
<div class="container">
    <form>
        <!-- name -->
        <div class="mb-3">
            <label for="nameUser" class="form-label">Name of User</label>
            <input type="text" class="form-control" id="nameUser" name="name" aria-describedby="emailHelp">
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
            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault2" value="2">
            <label class="form-check-label" for="flexRadioDefault2">
                Nữ
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault3" value="3" checked>
            <label class="form-check-label" for="flexRadioDefault2">
                Khác
            </label>
        </div>
        <!-- date of birth -->
        <div class="mb-3">
            <label for="nameUser" class="form-label">Date of birth</label>
            <input type="date" class="form-control" id="nameUser" name="date_of_birth" aria-describedby="emailHelp">
        </div>
        <!-- email -->
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <!-- phone number -->
        <div class="mb-3">
            <label for="nameUser" class="form-label">Phone number</label>
            <input type="text" class="form-control" id="nameUser" name="phone" aria-describedby="emailHelp">
        </div>
        <!-- password -->
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection