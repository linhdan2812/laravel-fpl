@extends('welcome')
@section('contents')
    @if (session('msg'))
        <p class="text-danger">{{ session('msg') }}</p>
    @else
        <p class="login-box-msg"></p>
    @endif
    <div class="login">
        <form action="" method="post">
            @csrf
            <div class="col-md-6 login-do">
                <div class="login-mail">
                    <input type="text" placeholder="Email" id="exampleInputEmail" name="email">
                    <i class="glyphicon glyphicon-envelope"></i>
                </div>
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="login-mail">
                    <input type="password" placeholder="Password" name="password">
                    <i class="glyphicon glyphicon-lock"></i>
                </div>
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <button class="btn btn-danger  hvr-skew-backward" type="submit">Login</button>
            </div>
        </form>
        <div class="col-md-6 login-right">
            <h3>Completely Free Account</h3>

            <p>Pellentesque neque leo, dictum sit amet accumsan non, dignissim ac mauris. Mauris rhoncus, lectus
                tincidunt tempus aliquam, odio
                libero tincidunt metus, sed euismod elit enim ut mi. Nulla porttitor et dolor sed condimentum. Praesent
                porttitor lorem dui, in pulvinar enim rhoncus vitae. Curabitur tincidunt, turpis ac lobortis hendrerit,
                ex elit vestibulum est, at faucibus erat ligula non neque.</p>
            <a href="{{ route('getRegister') }}">
                <button class="btn btn-danger hvr-skew-backward">Register</button>
            </a>
        </div>

        <div class="clearfix"> </div>
        </form>
    </div>
@endsection
