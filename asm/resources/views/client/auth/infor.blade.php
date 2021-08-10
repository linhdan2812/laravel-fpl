@extends('welcome')
@section('contents')
    <div class="login">
        <h3 class="text-center">Your Information</h3>
        <form>
            @csrf
            <div class="col-md-6 login-do">
                <div class="login-mail">
                    <input type="text" placeholder="Username" id="exampleInputEmail" name="username"
                        value="{{ Auth::user()->username }}" disabled>
                    <i class="glyphicon glyphicon-user"></i>
                </div>
                <div class="login-mail">
                    <input type="text" placeholder="Email" id="exampleInputEmail" name="email"
                        value="{{ Auth::user()->email }}" disabled>
                    <i class="glyphicon glyphicon-envelope"></i>
                </div>
                <div class="login-mail">
                    <input type="text" placeholder="Phone" id="exampleInputEmail" name="phone"
                        value="{{ Auth::user()->phone }}" disabled>
                    <i class="glyphicon glyphicon-phone"></i>
                </div>
            </div>
        </form>
        <div class="col-md-6 login-right">

        </div>

        <div class="clearfix"> </div>
        <a href="{{ route('getChangePass', Auth::user()->id) }}">
            <button class="btn btn-danger  hvr-skew-backward" type="submit">Change Password</button>
        </a>
    </div>
@endsection
