<!DOCTYPE html>

<head>
    <title>Bean Shop Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Colored Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
    addEventListener("load", function() {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }
    </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="{{asset('css/admins/bootstrap.css')}}">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/admins/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('css/admins/tableAdmin.css')}}">
    <link href="{{asset('css/admins/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{asset('css/admins/font.css')}}" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <!-- <link href="{{asset('css/admins/font-awesome.css')}}" rel="stylesheet"> -->
    <!-- //font-awesome icons -->
    <script src="{{asset('js/admins/jquery2.0.3.min.js')}}"></script>
    <script src="{{asset('js/admins/modernizr.js')}}"></script>
    <script src="{{asset('js/admins/jquery.cookie.js')}}"></script>
    <script src="{{asset('js/admins/screenfull.js')}}"></script>
    <script>
    $(function() {
        $('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

        if (!screenfull.enabled) {
            return false;
        }



        $('#toggle').click(function() {
            screenfull.toggle($('#container')[0]);
        });
    });
    </script>
    <!-- charts -->
    <script src="{{asset('js/admins/raphael-min.js')}}"></script>
    <script src="{{asset('js/admins/morris.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/admins/morris.css')}}">
    <!-- //charts -->
    <!--skycons-icons-->
    <script src="{{asset('js/admins/skycons.js')}}"></script>
    <!--//skycons-icons-->
</head>

<body class="dashboard-page">
    <script>
    var theme = $.cookie('protonTheme') || 'default';
    $('body').removeClass(function(index, css) {
        return (css.match(/\btheme-\S+/g) || []).join(' ');
    });
    if (theme !== 'default') $('body').addClass(theme);
    </script>
    @include('admins.layout.menu')
    <section class="wrapper scrollable">
        @include('admins.layout.header')

        <div class="main-grid">
            @yield('content')
        </div>
        <!-- footer -->
        <!-- //footer -->
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{asset('js/admins/bootstrap.js')}}"></script>
    <script src="{{asset('js/admins/proton.js')}}"></script>
</body>

</html>