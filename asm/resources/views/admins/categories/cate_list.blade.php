@extends('admins.dashboard')
@section('content')

    <!-- Page Heading -->
    <form action="{{ route('admin.cate.find') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Find</label>
            <input type="text" class="form-control" name="find">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Categories list</h6>
        </div>
        <div class="card-header py-3">
            <a href="{{ route('admin.cate.getCreate') }}">
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
                            <th>Brands</th>
                            <th>Active</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Cate Name</th>
                            <th>Brands</th>
                            <th>Active</th>

                        </tr>
                    </tfoot>
                    @php
                        $stt = 1;
                    @endphp
                    <tbody>
                        @foreach ($list_cate as $cate)
                            <tr>
                                <td>{{ $stt++ }}</td>
                                <td>{{ $cate->cate_name }}</td>
                                <td>{{ $cate->brand_name }}</td>

                                <td>
                                    {{-- <a href="{{ route('admin.cate.detail', $cate->id) }}">
                                        <i class="fas fa-eye" style="color:#FF00FF"></i>
                                    </a> --}}
                                    <a href="{{ route('admin.cate.getEdit', $cate->id) }}">
                                        <i class="fas fa-edit" style="color:green"></i>
                                    </a>
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.cate.delete', $cate->id) }}"
                                        onclick="return confirm('Khi bạn xoá danh mục này, các sản phẩm thuộc danh mục này cũng sẽ bị xoá. Bạn chắc chứ?')">
                                        <i class="fas fa-trash-alt" style="color:red"></i>
                                    </a>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $list_cate->links() }}
        </div>
    </div>

@endsection
