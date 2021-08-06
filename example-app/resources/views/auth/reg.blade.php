@extends('welcome')
@section('content')
    <h1>Regester form</h1>
    @if (session('msg'))
        <p class="text-danger">{{ session('msg') }}</p>
    @else
        <p class="login-box-msg"></p>
    @endif
    <form method="POST">
        @csrf
        <div class="form-group">
            <label for="">Your Username</label>
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="name">
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Your Email</label>
            <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email">
            @error('email')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="disabledSelect" class="form-label">your role</label>
            <select id="disabledSelect" class="form-select" name="role" disabled>
                <option value="1" selected>You are a reader</option>
                <option>You are a admin</option>
            </select>
        </div>
        <div class="form-group">
            <label for="">Your Password</label>
            <input class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
            @error('password')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <button type="submit" class="btn btn-primary mt-5">Submit</button>
    </form>
@endsection
