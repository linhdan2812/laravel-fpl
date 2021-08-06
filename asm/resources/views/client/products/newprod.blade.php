@extends('welcome')
@section('contents')
    <div class="content-mid">
        <h3>New Products</h3>
        <label class="line"></label>
        <div class="mid-popular">
            @foreach ($newprods as $n)
                <div class="col-md-3 item-grid simpleCart_shelfItem" style="margin-bottom: 15px">
                    <div class=" mid-pop">
                        <div class="pro-img">
                            <img src="{{ asset('uploads/' . $n->image) }}" width="250px" height="250px" alt="">
                            <div class="zoom-icon ">
                                <a class="picture" href="images/pc.jpg" rel="title"
                                    class="b-link-stripe b-animate-go  thickbox"><i
                                        class="glyphicon glyphicon-search icon "></i></a>
                                <a href="single.html"><i class="glyphicon glyphicon-menu-right icon"></i></a>
                            </div>
                        </div>
                        <div class="mid-1">
                            <div class="women">
                                <div class="women-top">
                                    <span>{{ $n->brand_name }}-{{ $n->cate_name }}</span>
                                    <h6><a href="single.html">{{ $n->prod_name }}</a></h6>
                                </div>
                                <div class="img item_add">
                                    <a href="#"><img src="images/ca.png" alt=""></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="mid-2">
                                <p><label></label><em class="item_price">{{ $n->price }} đ </em></p>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="clearfix"></div>
        </div>
    </div>
    {{-- OLD PROD --}}
    <div class="content-mid">
        <h3>Old Products</h3>
        <label class="line"></label>
        <div class="mid-popular">
            @foreach ($oldprods as $o)
                <div class="col-md-3 item-grid simpleCart_shelfItem" style="margin-bottom: 15px">
                    <div class=" mid-pop">
                        <div class="pro-img">
                            <img src="{{ asset('uploads/' . $o->image) }}" width="250px" height="250px" alt="">
                            <div class="zoom-icon ">
                                <a class="picture" href="images/pc.jpg" rel="title"
                                    class="b-link-stripe b-animate-go  thickbox"><i
                                        class="glyphicon glyphicon-search icon "></i></a>
                                <a href="single.html"><i class="glyphicon glyphicon-menu-right icon"></i></a>
                            </div>
                        </div>
                        <div class="mid-1">
                            <div class="women">
                                <div class="women-top">
                                    <span>{{ $o->brand_name }}-{{ $o->cate_name }}</span>
                                    <h6><a href="single.html">{{ $o->prod_name }}</a></h6>
                                </div>
                                <div class="img item_add">
                                    <a href="#"><img src="images/ca.png" alt=""></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="mid-2">
                                <p><label></label><em class="item_price">{{ $o->price }} đ </em></p>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="clearfix"></div>
        </div>
    </div>
    {{-- SALE --}}
    <div class="content-mid">
        <h3>Sale Products</h3>
        <label class="line"></label>
        <div class="mid-popular">
            @foreach ($saleprods as $s)
                <div class="col-md-3 item-grid simpleCart_shelfItem" style="margin-bottom: 15px">
                    <div class=" mid-pop">
                        <div class="pro-img">
                            <img src="{{ asset('uploads/' . $s->image) }}" width="250px" height="250px" alt="">
                            <div class="zoom-icon ">
                                <a class="picture" href="images/pc.jpg" rel="title"
                                    class="b-link-stripe b-animate-go  thickbox"><i
                                        class="glyphicon glyphicon-search icon "></i></a>
                                <a href="single.html"><i class="glyphicon glyphicon-menu-right icon"></i></a>
                            </div>
                        </div>
                        <div class="mid-1">
                            <div class="women">
                                <div class="women-top">
                                    <span>{{ $s->brand_name }}-{{ $s->cate_name }}</span>
                                    <h6><a href="single.html">{{ $o->prod_name }}</a></h6>
                                </div>
                                <div class="img item_add">
                                    <a href="#"><img src="images/ca.png" alt=""></a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="mid-2">
                                <p><em class="item_price">{{ $s->price }} đ </em></p>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="clearfix"></div>
        </div>
    </div>
@endsection
