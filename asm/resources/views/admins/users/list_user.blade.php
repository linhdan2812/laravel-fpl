@extends('admins.dashboard')
@section('content')

<!-- Page Heading -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">List User</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Active</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Active</th>

                    </tr>
                </tfoot>
                <tbody>
                    @php
                    $stt = 1
                    @endphp
                    @foreach($list_user as $user)
                    <tr>
                        <td>{{$stt++}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>
                            @if (($user->active) === 1)
                            <label class="bg bg-warning p-1 rounded-pill text-dark">Active</label>
                            @else
                            <label class="bg bg-info text-dark p-1 rounded-pill">Not Active</label>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('admin.user.getDetail', $user->id)}}">
                                <i class="fas fa-eye" style="color:#FF00FF"></i>
                            </a>
                            <a href="{{route('admin.user.getedit', $user->id)}}">
                                <i class="fas fa-edit" style="color:green"></i>
                            </a>

                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$list_user->links()}}
        </div>
    </div>
</div>

@endsection