@extends('admins.dashboard')

@section('content')

<form action="" method="POST">
    @csrf
    <div class="row">
        <div class="mb-3 col">
            <label for="exampleInputEmail1" class="form-label">Name of Product</label>
            <input type="text" class="form-control" value="{{$prod->prod_name}}" name="prod_name">
        </div>
        <div class="mb-3 col">
            <label for="exampleInputEmail1" class="form-label">Price</label>
            <input type="number" class="form-control" id="exampleInputEmail1" name="price">
        </div>
        <div class="mb-3 col">
            <label for="exampleInputEmail1" class="form-label">Sale percent</label>
            <input type="number" class="form-control" id="exampleInputEmail1" name="sale_percent">
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col">
            <label for="exampleInputEmail1" class="form-label">Category</label>
            <select id="disabledSelect" class="form-select" name="cate_id">
                @foreach($cate as $cate)
                <option value="{{$cate->id}}">{{$cate->cate_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 col">
            <label for="exampleInputEmail1" class="form-label">Image URL</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="image">
        </div>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Detail</label>
        <textarea id="w3review" name="detail" rows="4" cols="50" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection