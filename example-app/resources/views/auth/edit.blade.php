@extends('welcome')
@section('content')
    <h1>Edit your account</h1>
    {{-- @if (session('msg'))
        <p class="text-danger">{{ session('msg') }}</p>
    @else
        <p class="login-box-msg"></p>
    @endif --}}
    {{-- <form>
        @csrf
        <div class="form-group">
            <label for="">Your Username</label>
            <input type="text" class="form-control form-control-user" id="exampleInputEmail" name="name"
                value="{{ Auth::user()->name }}">
        </div>
        <div class="form-group">
            <label for="">Your Email</label>
            <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email"
                value="{{ Auth::user()->email }}">
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
            <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password"
                name="password" value="">
            <button type="submit" class="btn btn-primary mt-5">Submit</button>
    </form>
    <a href="{{ route('listBrand') }}"><button class="btn btn-warning mt-5">Cancel</button></a> --}}
    <h5>có một số chỗ đang bảo hành. thông cảm</h5>

@endsection
