@extends('admins.index')
@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card-counter primary">
            <i class="fa fa-home"></i>
            <span class="count-numbers"></span>
            <span class="count-name">Home</span>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-counter danger">
            <i class="fa fa-list"></i>
            <span class="count-numbers">{{$count_cate}}</span>
            <span class="count-name">Category</span>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-counter success">
            <i class="fa fa-database"></i>
            <span class="count-numbers">{{$count_prod}}</span>
            <span class="count-name">Products</span>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card-counter info">
            <i class="fa fa-users"></i>
            <span class="count-numbers">{{$count_user}}</span>
            <span class="count-name">Users</span>
        </div>
    </div>
</div>
@endsection