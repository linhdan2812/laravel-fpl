@extends('admins.dashboard')
@section('content')
<div class="container">
    <div class="p-3 mb-2 bg-secondary  ">
        <img src="{{asset('images/user default.png')}}" class="rounded mx-auto d-block rounded-circle">
    </div>
    <div class="p-3 mb-2 bg-info ">
        <h2 class="text-center text-dark">Infor User</h2>
        <h4 class="text-center text-dark">User Name: {{$detaiUser-> username}}</h4>
        <p class="text-center text-dark">Status: @if (($detaiUser->active) === 1)
            Active
            @else
            Not Active
            @endif
        </p>
    </div>
    <div class="row p-3 mb-2">
        <div class="col-sm-5 col-md-6 d-flex justify-content-center">
            <i class="fas fa-at mr-2"></i>
            <label>Email: {{$detaiUser-> email}}</label>
        </div>
        <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0 d-flex justify-content-center">
            <i class="fas fa-phone-square-alt mr-2"></i>
            <label>Phone number: {{$detaiUser-> phone}}</label>
        </div>
    </div>
    <!-- danh sách bình luận -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Comments</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Product</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    @php
                    $stt =1
                    @endphp
                    <tbody>
                        @foreach($comments as $c)
                        <tr>
                            <td>{{$stt++}}</td>
                            <td>{{$c->prod_name}}</td>
                            <td>{{$c->content}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection