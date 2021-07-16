@extends('admins.dashboard')
@section('content')

<!-- Page Heading -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Products list</h6>
    </div>
    <div class="card-header py-3">
        <a href="{{route('admin.prod.getCreate')}}">
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
                $stt=1
                @endphp
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$stt++}}</td>
                        <td>{{$product->prod_name}}</td>
                        <td>{{$product->cate_name}}</td>
                        <td>{{$product->price}}</td>
                        <td><img src="{{ $product->image }}" alt="" width="150" height="150"></td>
                        <th>{{$product->sale_percent}}</th>
                        <td>
                            <a href="">
                                <i class="fas fa-eye" style="color:#FF00FF"></i>
                            </a>
                            <a href="{{route('admin.prod.getEdit',$product->id )}}">
                                <i class="fas fa-edit" style="color:green"></i>
                            </a>
                            <form action="{{route('admin.prod.delete',['id'=> $product->id])}}" method="post"
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
            {{$products->links()}}
        </div>

    </div>
</div>

@endsection