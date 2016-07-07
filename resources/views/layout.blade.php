<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Songbook by Stanislav</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--<link href="{{ URL::to('/') }}/css/frontend.css" rel="stylesheet">--}}
    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::to('/') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/css/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ URL::to('/') }}/css/stylish.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ URL::to('/') }}/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top">
@include('navigation')
@yield('content')
<!-- jQuery -->
<script src="{{ URL::to('/') }}/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ URL::to('/') }}/js/bootstrap.min.js"></script>
<script src="{{ URL::to('/') }}/js/stylish.js"></script>
<script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    //#to-top button appears after scrolling
    var fixed = false;
    $(document).scroll(function() {
        if ($(this).scrollTop() > 250) {
            if (!fixed) {
                fixed = true;
                $('#to-top').show("slow", function() {
                    $('#to-top').css({
                        position: 'fixed',
                        display: 'block'
                    });
                });
            }
        } else {
            if (fixed) {
                fixed = false;
                $('#to-top').hide("slow", function() {
                    $('#to-top').css({
                        display: 'none'
                    });
                });
            }
        }
    });
</script>
@stack('scripts')
</body>
</html>
