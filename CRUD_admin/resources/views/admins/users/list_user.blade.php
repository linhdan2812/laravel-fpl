@extends('admins.index')
@section('content')
<!-- <div class="container"> -->
<h1 class="mb-5 mt-5 text-center">List User</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col" style="width: 50px">id</th>
            <th scope="col" style="width: 250px">Name</th>
            <th scope="col" style="width: 90px">Gender</th>
            <th scope="col">Date Of Birth</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($list_user as $user)
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td class="text-center">@if (($user->gender) === 1)
                Nam
                @elseif (($user->gender) === 0)
                Nữ
                @else
                Khác
                @endif</td>
            <td class="text-center">{{Carbon\Carbon::parse($user->date_of_birth)->format('j F, Y')}}</td>
            <td class="text-center">{{$user->phone}}</td>
            <td>{{$user->email}}</td>
            <td>
                <i class="fas fa-eye" style="color:blue"></i>
                <i class="fas fa-edit" style="color:green"></i>
                <i class="fas fa-trash-alt" style="color:red"></i>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center">{{ $list_user->links()}}</div>

<!-- </div> -->
@endsection