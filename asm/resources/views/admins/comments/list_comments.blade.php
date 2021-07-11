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
                        <th>User Name</th>
                        <th>Products</th>
                        <th>Content</th>
                        <th>Status</th>
                        <th>Active</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>User Name</th>
                        <th>Products</th>
                        <th>Content</th>
                        <th>Status</th>
                        <th>Active</th>

                    </tr>
                </tfoot>
                @php
                $stt=1
                @endphp
                <tbody>
                    @foreach($comments as $cmt)
                    <tr>
                        <td>{{$stt++}}</td>
                        <td>{{$cmt->username}}</td>
                        <td>{{$cmt->prod_name}}</td>
                        <td>{{$cmt ->content}}</td>
                        <td>
                            @if (($cmt->status) === 1)
                            Approved
                            @else
                            Not Approved
                            @endif
                        </td>
                        <td>
                            <a href="{{route('admin.cmt.getEdit', $cmt->id)}}">
                                <i class="fas fa-edit" style="color:green"></i>
                            </a>
                            @csrf
                            @method('DELETE')
                            <a href="{{route('admin.cmt.delete', $cmt->id)}}">
                                <i class="fas fa-trash-alt" style="color:red"></i>
                            </a>

                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection