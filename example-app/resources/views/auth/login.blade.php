@extends('welcome')
@section('content')
    <h1>Login form</h1>
    @if (session('msg'))
        <p class="text-danger">{{ session('msg') }}</p>
    @else
        <p class="login-box-msg"></p>
    @endif
    <form method="POST">
        @csrf
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email"
                placeholder="Your email">
        </div>
        <div class="form-group">
            <label for="">Your Password</label>
            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password"
                name="password">
            <button type="submit" class="btn btn-primary mt-5">Submit</button>
    </form>
@endsection
