@extends('admins.dashboard')

@section('content')

    <form action="" method="POST">
        @csrf
        @foreach ($prod as $prod)
            <div>
                <div class="row">
                    <div class="mb-3 col">
                        <label for="exampleInputEmail1" class="form-label">Name of Product</label>
                        <input type="text" class="form-control" value="{{ $prod->prod_name }}" name="prod_name">
                    </div>
                    <div class="mb-3 col">
                        <label for="exampleInputEmail1" class="form-label">Price</label>
                        <input type="number" class="form-control" value="{{ $prod->price }}" name="price">
                    </div>
                    <div class="mb-3 col">
                        <label for="exampleInputEmail1" class="form-label">Sale percent</label>
                        <input type="number" class="form-control" value="{{ $prod->sale_percent }}" name="sale_percent">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Category</label>
                    <select id="disabledSelect" class="form-select" name="cate_id">
                        @foreach ($cate as $c)
                            <option value="{{ $c->id }}">{{ $c->cate_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="mb-3 col">
                        <label for="exampleInputEmail1" class="form-label">Image</label>
                        <input type="file" class="form-control" name="image" value="{{ $prod->image }}">
                    </div>
                    <div class="mb-3 col">
                        <img src="{{ asset('storage/products/' . $prod->image) }}" alt="" width="100px" height="100px"
                            class="rounded">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Detail</label>
                    <textarea id="w3review" name="detail" rows="4" cols="50"
                        class="form-control">{{ $prod->detail }}</textarea>
                </div>
            </div>
        @endforeach
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

@endsection
