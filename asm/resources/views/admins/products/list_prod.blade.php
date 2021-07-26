@extends('admins.dashboard')
@section('content')

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <!-- lọc -->
    <form class="mb-3" action="{{ route('admin.prod.postlist') }}" method="post">
        @csrf
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">find</label>
                    <input type="text" class="form-control" name="find">
                </div>
            </div>
            <div class="col">
                <label for="disabledSelect" class="form-label">filter</label>
                <div class="mb-3">
                    <select id="disabledSelect" class="form-select" name="filterPrice">
                        <option value="0">Mặc định</option>
                        <option value="1">Giá tăng dần</option>
                        <option value="2">Giá giảm dần</option>
                        <option value="3">Có giảm giá</option>
                        <option value="4">Không giảm giá</option>
                        <option value="5">Sale tăng dần</option>
                        <option value="6">Sale giảm dần</option>
                    </select>
                </div>
            </div>
            <div class="col">
                <label for="exampleInputEmail1" class="form-label">Category</label>
                <div class="mb-3">

                    <select id="disabledSelect" class="form-select" name="filterCate">
                        <option value="0">mặc định</option>
                        @foreach ($cate as $c)
                            <option value="{{ $c->id }}">{{ $c->cate_name }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>
    <!-- danh sách -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Products list</h6>
        </div>
        <div class="card-header py-3">
            <a href="{{ route('admin.prod.getCreate') }}">
                <button type="button" class="btn btn-primary">+ Create New</button>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Cate</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Sale</th>
                            <th>Active</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Cate</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Sale</th>
                            <th>Active</th>

                        </tr>
                    </tfoot>
                    @php
                        $stt = 1;
                    @endphp
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $stt++ }}</td>
                                <td>{{ $product->prod_name }}</td>
                                <td>{{ $product->cate_name }}</td>
                                <td>{{ $product->price }}</td>
                                <td><img src="{{ asset('storage/' . $product->image) }}" alt="" width="150" height="150">
                                </td>
                                <th>{{ $product->sale_percent }}</th>
                                <td>
                                    <a href="{{ route('admin.prod.detail', $product->id) }}">
                                        <i class="fas fa-eye" style="color:#FF00FF"></i>
                                    </a>
                                    <a href="{{ route('admin.prod.getEdit', $product->id) }}">
                                        <i class="fas fa-edit" style="color:green"></i>
                                    </a>
                                    <form action="{{ route('admin.prod.delete', ['id' => $product->id]) }}" method="post"
                                        style="width:15px; height: 20px; display: inline-block;">
                                        @csrf
                                        <button type="submit" class="btn btn-link" style="padding: 0px;"><i
                                                class="fas fa-trash-alt" style="color:red"></i></button>
                                    </form>


                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>

@endsection
