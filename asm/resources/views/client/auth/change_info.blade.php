@extends('welcome')
@section('contents')
    <div class="login">
        <h3 class="text-center">Change Password</h3>

        <form action="" method="POST">
            @csrf
            <div class="col-md-6 login-do">
                <div class="login-mail">
                    <input type="password" placeholder="Password" name="password">
                    <i class="glyphicon glyphicon-lock"></i>
                </div>
                @if (session('msg'))
                    <p class="text-danger">{{ session('msg') }}</p>
                @else
                    <p class="login-box-msg"></p>
                @endif
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="login-mail">
                    <input type="password" placeholder="New Password" name="new_password">
                    <i class="glyphicon glyphicon-lock"></i>
                </div>
                @error('new_password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <button class="btn btn-danger  hvr-skew-backward" type="submit">Save</button>
            </div>
        </form>
        <div class="col-md-6 login-right">

        </div>

        <div class="clearfix"> </div>
    </div>
@endsection
