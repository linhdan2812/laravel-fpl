@extends('admins.dashboard')
@section('content')

<!-- Page Heading -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Categories list</h6>
    </div>
    <div class="card-header py-3">
        <a href="{{route('admin.cate.getCreate')}}">
            <button type="button" class="btn btn-primary">+ Create New</button>
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Cate Name</th>
                        <!-- <th>Products</th> -->
                        <th>Active</th>

                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Cate Name</th>
                        <!-- <th>Products</th> -->
                        <th>Active</th>

                    </tr>
                </tfoot>
                @php
                $stt=1
                @endphp
                <tbody>
                    @foreach($list_cate as $cate)
                    <tr>
                        <td>{{$stt++}}</td>
                        <td>{{$cate->cate_name}}</td>

                        <td>
                            <a href="{{route('admin.cate.getEdit', $cate->id)}}">
                                <i class="fas fa-edit" style="color:green"></i>
                            </a>
                            @csrf
                            @method('DELETE')
                            <a href="{{route('admin.cate.delete', $cate->id)}}">
                                <i class="fas fa-trash-alt" style="color:red"></i>
                            </a>

                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{$list_cate->links()}}
    </div>
</div>

@endsection