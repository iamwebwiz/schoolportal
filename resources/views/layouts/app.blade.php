<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>School Name - @yield('page-title')</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ asset('app/css/normalize.css') }}"> 
    <link rel="stylesheet" href="{{ asset('app/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('app/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app/css/cs-skin-elastic.css') }}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{ asset('app/scss/style.css') }}">
    <link href="{{ asset('app/css/lib/vector-map/jqvmap.min.css') }}" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('css/toastr.min.css') }}">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>


        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
    @include('includes.nav')
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

          @include('includes.header')

        </header><!-- /header -->
        <!-- Header-->

        @include('includes.breadcrumbs')

    <div class="container">@yield('content')</div>
    

    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="{{ asset('app/js/vendor/jquery-2.1.4.min.js') }}"></script>
    
    {{--  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="{{ asset('app/js/plugins.js') }}"></script>
    <script src="{{ asset('app/js/main.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js')}}"></script>
    <script>
            @if(Session::has('success'))
                toastr.success("{{ Session::get('success') }}")
            @endif

            @if(Session::has('info'))
                toastr.info("{{ Session::get('info') }}")
            @endif
    </script>
    
    <script src="{{ asset('app/js/lib/chart-js/Chart.bundle.js') }}"></script>
    <script src="{{ asset('app/js/dashboard.js') }}"></script>
    <script src="{{ asset('app/js/widgets.js') }}"></script>
    <script src="{{ asset('app/js/lib/vector-map/jquery.vmap.js') }}"></script>
    <script src="{{ asset('app/js/lib/vector-map/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('app/js/lib/vector-map/jquery.vmap.sampledata.js') }}"></script>
    <script src="{{ asset('app/js/lib/vector-map/country/jquery.vmap.world.js') }}"></script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>

</body>
</html>
