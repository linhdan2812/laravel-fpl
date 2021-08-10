@extends('welcome')
@section('contents')
    <div class="login">
        <form action="" method="post">
            @csrf
            <div class="col-md-6 login-do">
                <div class="login-mail">
                    <input type="text" placeholder="Username" id="exampleInputEmail" name="username">
                    <i class="glyphicon glyphicon-user"></i>
                </div>
                @error('username')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="login-mail">
                    <input type="text" placeholder="Email" id="exampleInputEmail" name="email">
                    <i class="glyphicon glyphicon-envelope"></i>
                </div>
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="login-mail">
                    <input type="text" placeholder="Phone" id="exampleInputEmail" name="phone">
                    <i class="glyphicon glyphicon-phone"></i>
                </div>
                @error('phone')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="login-mail">
                    <input type="password" placeholder="Password" name="password">
                    <i class="glyphicon glyphicon-lock"></i>
                </div>
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <button class="btn btn-danger  hvr-skew-backward" type="submit">Register</button>
            </div>
        </form>
        <div class="col-md-6 login-right">
            <h3>Completely Free Account</h3>

            <p>Pellentesque neque leo, dictum sit amet accumsan non, dignissim ac mauris. Mauris rhoncus, lectus
                tincidunt tempus aliquam, odio
                libero tincidunt metus, sed euismod elit enim ut mi. Nulla porttitor et dolor sed condimentum. Praesent
                porttitor lorem dui, in pulvinar enim rhoncus vitae. Curabitur tincidunt, turpis ac lobortis hendrerit,
                ex elit vestibulum est, at faucibus erat ligula non neque.</p>
            <a href="{{ route('client.getlogin') }}">
                <button class="btn btn-danger hvr-skew-backward">Login</button>
            </a>
        </div>

        <div class="clearfix"> </div>
        </form>
    </div>
@endsection
