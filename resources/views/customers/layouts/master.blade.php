<!DOCTYPE html>
<html>
<head>
    <title>Thrive Books</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!--meta info-->
    <link rel="icon" type="image/ico" href="{{asset('website/images/assets/fav.jpg')}}">
    <!--stylesheet include-->
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="Thrive Books" name="description">
    <meta content="Christian Books" name="keywords">
    <meta content="INDEX,FOLLOW" name="robots">
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600&display=swap" rel="stylesheet">
    <link href="{{asset('assets/css/bootstrap.min.css')}}" media="all" type="text/css" rel="stylesheet"/>
    <link href="{{asset('website/css/styles.css')}}" media="all" type="text/css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{asset('website/js/font-awesome-4.5.0/css/font-awesome.min.css')}}">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!--stylesheet include-->
    <link rel="stylesheet" href="{{asset('website/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('website/css/settings.css')}}">
    <link rel="stylesheet" type="text/css" media="all" href="{{asset('website/css/style.css')}}">
    <link href="{{asset('website/js/custom.css')}}" rel="stylesheet">
    <!-- Owl Carousel Assets -->
    <link href="{{asset('website/js/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('website/js/owl.theme.css')}}" rel="stylesheet">
    <!-- Le fav and touch icons -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:600' rel='stylesheet' type='text/css'>
    <style>
        .styled-table {
            /*border-collapse: collapse;*/
            /*margin: 25px 0;*/
            font-size: 1.1em;
            font-family: 'Montserrat';
            /*min-width: 400px;*/
            width: 100%;
            overflow-y: scroll;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }
        .styled-table thead tr {
            background-color: #1B5E20;
            color: #ffffff;
            text-align: left;
        }
        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }
        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #1B5E20;
        }
        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #1B5E20;
        }

    /*    Inputs*/
        input[type=text],input[type=date],input[type=email]{
            padding-top:2em;
            padding-bottom:2em;
            border:0;
            box-shadow:0 0 15px 4px rgba(0,0,0,0.06);
            margin-bottom: 2em;
            margin-top: 2em;
            font-family: 'Montserrat';
        }
    </style>
    @stack('styles')
</head>
<body>
<div class="page-wrapper">

    @include('customers.layouts.topnav')

    @yield('content')

    @include('customers.layouts.footer')

</div>
<script src="{{asset('website/js/wow.min.js')}}"></script>
<script>
    new WOW().init();
</script>
<script src="{{asset('website/js/jquery.min.js')}}"></script>
<script src="{{asset('website/js/bootstrap.min.js')}}"></script>
<script src="{{asset('website/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('website/js/script_menu.js')}}"></script>
<script src="{{asset('website/js/data_time.js')}}"></script>
<script src="{{asset('website/js/back_to_top.js')}}"></script>
<script src="{{asset('website/js/jquery.themepunch.plugins.min.js')}}"></script>
<script src="{{asset('website/js/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{asset('website/js/scripts.js')}}"></script>
<script>

    $(document).ready(function() {

        $("#owl-demo-tabs").owlCarousel({
            items : 5,
            itemsCustom : false,
            itemsDesktop : [1199,4],
            itemsDesktopSmall : [992,3],
            itemsTablet: [768,2],
            itemsTabletSmall: false,
            itemsMobile : [480,1],
        });

        $("#owl-demo-banner").owlCarousel({
            items : 3,
            itemsCustom : false,
            itemsDesktop : [1199,4],
            itemsDesktopSmall : [992,3],
            itemsTablet: [768,2],
            itemsTabletSmall: false,
            itemsMobile : [480,1],
        });

        $("#owl-demo-banner-icon").owlCarousel({
            autoPlay: 3000, //Set AutoPlay to 3 seconds
            items : 6,
            itemsCustom : false,
            itemsDesktop : [1199,6],
            itemsDesktopSmall : [992,5],
            itemsTablet: [768,4],
            itemsTabletSmall: false,
            itemsMobile : [480,3],
        });
        $("#owl-demo").owlCarousel({
            items : 5,
            itemsCustom : false,
            itemsDesktop : [1199,4],
            itemsDesktopSmall : [992,3],
            itemsTablet: [768,2],
            itemsTabletSmall: false,
            itemsMobile : [480,1],
        });

        $("#owl-demo-tabs-3").owlCarousel({
            items : 5,
            itemsCustom : false,
            itemsDesktop : [1199,4],
            itemsDesktopSmall : [992,3],
            itemsTablet: [768,2],
            itemsTabletSmall: false,
            itemsMobile : [480,1],
        });

        $("#owl-demo2").owlCarousel({
            // autoPlay: 3000,
            items:2,
            itemsCustom : false,
            itemsDesktop : [1199,2],
            itemsDesktopSmall : [992,2],
            itemsTablet: [768,2],
            itemsTabletSmall: false,
            itemsMobile : [480,1],
            navigation : false

        });

        $("#owl-demo3").owlCarousel({
            items:2,
            itemsCustom : false,
            itemsDesktop : [1199,2],
            itemsDesktopSmall : [992,2],
            itemsTablet: [768,2],
            itemsTabletSmall: false,
            itemsMobile : [480,1],
            navigation : false
        });

        $("#owl-demo4").owlCarousel({
            items:2,
            itemsCustom : false,
            itemsDesktop : [1199,2],
            itemsDesktopSmall : [992,2],
            itemsTablet: [768,2],
            itemsTabletSmall: false,
            itemsMobile : [480,1],
            navigation : false
        });

        $( '.main-content' ).each(function() {

            $( this ).find('.nav-tabs li a').click(function(e){
                e.preventDefault();
                var selector = $(this).attr('href');
                $(this).parent().parent().find('a').not(this).removeClass('active');
                $(this).addClass('active');
                $(this).parents('.main-content').find('.sp-contten').not(selector).slideUp(300);
                $(this).parents('.main-content').find(selector).slideDown(300);
            });
        });
    });
</script>
@stack('scripts')
    @
</body>
</html>
