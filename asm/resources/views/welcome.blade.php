<!DOCTYPE html>
<html>

<head>
    <title>Fashion web</title>
    <link href="{{ asset('client/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
    <!-- Custom Theme files -->
    <!--theme-style-->
    <link href="{{ asset('client/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Shopin Responsive web template, Bootstrap Web Templates, Flat Web Templates, AndroId Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    {{-- {{ asset('client/css/jstarbox.css') }} --}}
    <!--theme-style-->
    <link href="{{ asset('client/css/style4.css') }}" rel="stylesheet" type="text/css" media="all" />
    <!--//theme-style-->
    <script src="{{ asset('client/js/jquery.min.js') }}"></script>
    <!--- start-rate---->
    <script src="{{ asset('client/js/jstarbox.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('client/css/jstarbox.css') }}" type="text/css" media="screen"
        charset="utf-8" />
    <script type="text/javascript">
        jQuery(function() {
            jQuery('.starbox').each(function() {
                var starbox = jQuery(this);
                starbox.starbox({
                    average: starbox.attr('data-start-value'),
                    changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass(
                        'clickonce') ? 'once' : true,
                    ghosting: starbox.hasClass('ghosting'),
                    autoUpdateAverage: starbox.hasClass('autoupdate'),
                    buttons: starbox.hasClass('smooth') ? false : starbox.attr(
                        'data-button-count') || 5,
                    stars: starbox.attr('data-star-count') || 5
                }).bind('starbox-value-changed', function(event, value) {
                    if (starbox.hasClass('random')) {
                        var val = Math.random();
                        starbox.next().text(' ' + val);
                        return val;
                    }
                })
            });
        });
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@300&display=swap" rel="stylesheet">
</head>

<body>
    <!--header-->
    <div class="header">
        <div class="container">
            <div class="head">
                <div class=" logo">
                    <a href="index.html"><img src="images/logo.png" alt=""></a>
                </div>
            </div>
        </div>
        <div class="header-top">
            <div class="container">
                <div class="col-sm-5 col-md-offset-2  header-login">
                    <ul>
                        {{-- @if (Auth::check() == true)
                            <li><a href="checkout.html">{{ Auth::user()->username }}</a></li>
                            <li><a href="{{ route('logout') }}">logout</a></li>
                            @if (Auth::user()->active == 0)
                                <li><a href="{{ route('admin.analytic') }}">Admin</a></li>
                            @endif
                        @else
                            <li><a href="{{ route('client.getlogin') }}">Login</a></li>
                            <li><a href="{{ route('getRegister') }}">Register</a></li>
                        @endif --}}
                        <li><a href="checkout.html">Checkout</a></li>
                    </ul>
                </div>

                <div class="col-sm-5 header-social">
                    <ul>
                        <li><a href="#"><i></i></a></li>
                        <li><a href="#"><i class="ic1"></i></a></li>
                        <li><a href="#"><i class="ic2"></i></a></li>
                        <li><a href="#"><i class="ic3"></i></a></li>
                        <li><a href="#"><i class="ic4"></i></a></li>
                    </ul>

                </div>
                <div class="clearfix"> </div>
            </div>
        </div>

        <div class="container">

            <div class="head-top">

                <div class="col-sm-8 col-md-offset-2 h_menu4">
                    <nav class="navbar nav_bottom" role="navigation">

                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header nav_2">
                            <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse"
                                data-target="#bs-megadropdown-tabs">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                            <ul class="nav navbar-nav nav_1">
                                <li><a class="color" href="{{ route('home') }}">Home</a></li>

                                <li class="dropdown mega-dropdown active">
                                    <a class="color1" href="#" class="dropdown-toggle"
                                        data-toggle="dropdown">Brands<span class="caret"></span></a>
                                    <div class="dropdown-menu ">
                                        <div class="menu-top">
                                            <div class="col1">
                                                <div class="h_nav">
                                                    <ul>
                                                        @foreach ($brands as $brand)
                                                            <li><a href="product.html">{{ $brand->brand_name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col1 col5">
                                                <img src="images/me.png" class="img-responsive" alt="">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown mega-dropdown active">
                                    <a class="color2" href="#" class="dropdown-toggle"
                                        data-toggle="dropdown">Categories<span class="caret"></span></a>
                                    <div class="dropdown-menu mega-dropdown-menu">
                                        <div class="menu-top">
                                            <div class="col1">
                                                <div class="h_nav">
                                                    <ul>
                                                        @foreach ($cates as $c)
                                                            <li><a href="product.html">{{ $c->cate_name }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col1 col5">
                                                <img src="images/me1.png" class="img-responsive" alt="">
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </li>
                                <li><a class="color3" href="product.html">Sale</a></li>
                                <li><a class="color4" href="404.html">About</a></li>
                                <li><a class="color5" href="typo.html">Short Codes</a></li>
                                <li><a class="color6" href="contact.html">Contact</a></li>
                                @if (Auth::check() == true)
                                    <li class="dropdown mega-dropdown active">
                                        <a class="color2" href="#" class="dropdown-toggle"
                                            data-toggle="dropdown">{{ Auth::user()->username }}<span
                                                class="caret"></span></a>
                                        <div class="dropdown-menu mega-dropdown-menu">
                                            <div class="menu-top">
                                                <div class="col1">
                                                    <div class="h_nav">
                                                        <ul>
                                                            <li>
                                                                <a href="{{ route('userinfor') }}">User Infor</a>
                                                                @if (Auth::user()->active == 0)
                                                                    <a href="{{ route('admin.analytic') }}">Admin</a>
                                                                @endif
                                                                <a href="{{ route('logout') }}">Logout</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col1 col5">
                                                    <img src="images/me1.png" class="img-responsive" alt="">
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </li>
                                @else
                                    <li><a href="{{ route('client.getlogin') }}">Login</a></li>
                                    <li><a href="{{ route('getRegister') }}">Register</a></li>
                                @endif

                            </ul>
                        </div><!-- /.navbar-collapse -->

                    </nav>
                </div>
                <div class="col-sm-2 search-right">
                    <ul class="heart">
                        <li>
                            <a href="wishlist.html">
                                <span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                            </a>
                        </li>
                        <li><a class="play-icon popup-with-zoom-anim" href="#small-dialog"><i
                                    class="glyphicon glyphicon-search">
                                </i></a></li>
                    </ul>
                    <div class="cart box_1">
                        <a href="checkout.html">
                            <h3>
                                <div class="total">
                                    <span class="simpleCart_total"></span>
                                </div>
                                <img src="images/cart.png" alt="" />
                            </h3>
                        </a>
                        <p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>

                    </div>
                    <div class="clearfix"> </div>

                    <!----->

                    <!---pop-up-box---->
                    <link href="{{ asset('client/css/popuo-box.css') }}" rel="stylesheet" type="text/css"
                        media="all" />
                    <script src="{{ asset('client/js/jquery.magnific-popup.js') }}" type="text/javascript"></script>
                    <!---//pop-up-box---->
                    <div id="small-dialog" class="mfp-hide">
                        <div class="search-top">
                            <div class="login-search">
                                <input type="submit" value="">
                                <input type="text" value="Search.." onfocus="this.value = '';"
                                    onblur="if (this.value == '') {this.value = 'Search..';}">
                            </div>
                            <p>Shopin</p>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('.popup-with-zoom-anim').magnificPopup({
                                type: 'inline',
                                fixedContentPos: false,
                                fixedBgPos: true,
                                overflowY: 'auto',
                                closeBtnInside: true,
                                preloader: false,
                                midClick: true,
                                removalDelay: 300,
                                mainClass: 'my-mfp-zoom-in'
                            });

                        });
                    </script>
                    <!----->
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!--banner-->
    <div class="banner">
        <div class="container">
            <section class="rw-wrapper">
                <h1 class="rw-sentence">
                    <span>Fashion &amp; Beauty</span>
                    <div class="rw-words rw-words-1">
                        <span>Beautiful Designs</span>
                        <span>Sed ut perspiciatis</span>
                        <span> Totam rem aperiam</span>
                        <span>Nemo enim ipsam</span>
                        <span>Temporibus autem</span>
                        <span>intelligent systems</span>
                    </div>
                    <div class="rw-words rw-words-2">
                        <span>We denounce with right</span>
                        <span>But in certain circum</span>
                        <span>Sed ut perspiciatis unde</span>
                        <span>There are many variation</span>
                        <span>The generated Lorem Ipsum</span>
                        <span>Excepteur sint occaecat</span>
                    </div>
                </h1>
            </section>
        </div>
    </div>
    <!--content-->
    <div class="content" style="margin-bottom: 20px">
        <div class="container">
            <!--products-->
            @yield('contents')
            {{-- @include('client.products.newprod') --}}
        </div>

    </div>
    <!--//content-->
    <!--//footer-->
    <div class="footer">
        <div class="footer-middle">
            <div class="container">
                <div class="col-md-3 footer-middle-in">
                    <a href="index.html"><img src="images/log.png" alt=""></a>
                    <p>Suspendisse sed accumsan risus. Curabitur rhoncus, elit vel tincidunt elementum, nunc urna
                        tristique nisi, in interdum libero magna tristique ante. adipiscing varius. Vestibulum dolor
                        lorem.</p>
                </div>

                <div class="col-md-3 footer-middle-in">
                    <h6>Information</h6>
                    <ul class=" in">
                        <li><a href="404.html">About</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                        <li><a href="#">Returns</a></li>
                        <li><a href="contact.html">Site Map</a></li>
                    </ul>
                    <ul class="in in1">
                        <li><a href="#">Order History</a></li>
                        <li><a href="wishlist.html">Wish List</a></li>
                        <li><a href="{{ route('client.getlogin') }}">Login</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-3 footer-middle-in">
                    <h6>Tags</h6>
                    <ul class="tag-in">
                        <li><a href="#">Lorem</a></li>
                        <li><a href="#">Sed</a></li>
                        <li><a href="#">Ipsum</a></li>
                        <li><a href="#">Contrary</a></li>
                        <li><a href="#">Chunk</a></li>
                        <li><a href="#">Amet</a></li>
                        <li><a href="#">Omnis</a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-middle-in">
                    <h6>Newsletter</h6>
                    <span>Sign up for News Letter</span>
                    <form>
                        <input type="text" value="Enter your E-mail" onfocus="this.value='';"
                            onblur="if (this.value == '') {this.value ='Enter your E-mail';}">
                        <input type="submit" value="Subscribe">
                    </form>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <ul class="footer-bottom-top">
                    <li><a href="#"><img src="images/f1.png" class="img-responsive" alt=""></a></li>
                    <li><a href="#"><img src="images/f2.png" class="img-responsive" alt=""></a></li>
                    <li><a href="#"><img src="images/f3.png" class="img-responsive" alt=""></a></li>
                </ul>
                <p class="footer-class">&copy; 2016 Shopin. All Rights Reserved | Design by <a
                        href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!--//footer-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    {{-- {{ asset('client/css/chocolat.css') }} --}}
    <script src="{{ asset('client/js/simpleCart.min.js') }}"> </script>
    <!-- slide -->
    <script src="{{ asset('client/js/bootstrap.min.js') }}"></script>
    <!--light-box-files -->
    <script src="{{ asset('client/js/jquery.chocolat.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('client/css/chocolat.css') }}" type="text/css" media="screen"
        charset="utf-8">
    <!--light-box-files -->
    <script type="text/javascript" charset="utf-8">
        $(function() {
            $('a.picture').Chocolat();
        });
    </script>


</body>

</html>
