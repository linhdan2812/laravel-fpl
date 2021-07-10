@extends('admins.index')
@section('content')
<!-- <div class="container"> -->
<h1 class="mb-5 mt-5 text-center">List User</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col" style="width: 50px">#</th>
            <th scope="col" style="width: 50px">id</th>
            <th scope="col">Name</th>
            <th scope="col" style="width: 90px">Gender</th>
            <th scope="col" style="width: 150px">Date Of Birth</th>
            <th scope="col" style="width: 150px">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @php
        $stt =1
        @endphp
        @foreach($list_user as $user)
        <tr>
            <th scope="row">{{$stt++}}</th>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>@if (($user->gender) === 1)
                Nam
                @elseif (($user->gender) === 0)
                Nữ
                @else
                Khác
                @endif</td>
            <td>{{Carbon\Carbon::parse($user->date_of_birth)->format('d-m-Y')}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->email}}</td>
            <td>
                <a href="{{route('user.detail', $user->id)}}" style="margin:0px">
                    <i class="fas fa-eye" style="color:blue"></i>
                </a>
                <a href="{{route('user.edit', $user->id)}}" style="margin:0px">
                    <i class="fas fa-edit" style="color:green"></i>
                </a>

                <!-- nút delete -->
                @csrf
                @method('DELETE')
                <a href="{{route('user.delete', $user->id)}}" style="margin:0px">
                    <i class="fas fa-trash-alt" style="color:red"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center">{{ $list_user->links()}}</div>

<!-- </div> -->
@endsection