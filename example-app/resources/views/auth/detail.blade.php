@extends('welcome')
@section('content')
    <h3>UserName: {{ Auth::user()->name }}</h3>
    <span>Email: {{ Auth::user()->email }}</span>
    <div>
        <a href="{{ route('editUser') }}">
            <button class="btn btn-info">chỉnh sửa tài khoản</button>
        </a>
    </div>
@endsection
