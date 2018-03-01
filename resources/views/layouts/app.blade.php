<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Event Manager</title>
    
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <link href="https://fonts.googleapis.com/css?family=Aclonica" rel="stylesheet">
    
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('css/style.sea.css') }}" id="theme-stylesheet">
    
    <!-- Font Awesome 4 LOCAL-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.css') }}">
    <script type="text/javascript" src="{{ asset('js/fontawesome.js') }}"></script>
    
    <!-- Font Icons CSS-->
    <link rel="stylesheet" href="https://file.myfontastic.com/da58YPMQ7U5HY8Rb6UxkNf/icons.css">
    
    {{-- flashy --}}
    <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700' rel='stylesheet'>

    
    {{-- datatables --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.min.css') }}">

    {{-- font selector --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fontselect.css') }}">

    {{-- overide css --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    
    @stack('loader')
    <div class="page home-page">
      
        @include('layouts.topbar')

        <div class="page-content d-flex align-items-stretch">
            
            @stack('sidebar')

            <div class="content-inner">
              <!-- Page Header-->
                <header class="page-header">
                    <div class="container-fluid">
                        <h2 class="no-margin-bottom">
                            @stack('title')
                        </h2>
                    </div>
                </header>
                
                @yield('content')

            </div>
        </div>
    </div>



    <!-- Javascript files-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/tether.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('js/jquery.validate.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    {{-- <script src="{{ asset('js/charts-custom.js') }}"></script> --}}
    <script src="{{ asset('js/charts-home.js') }}"></script>
    <script src="{{ asset('js/front.js') }}"></script>
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    <script src="{{ asset('js/jquery.fontselect.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            $(".iconimage").animate({height: "35px"});
        });
    </script>

    @include('inc.flashy')
    @stack('scripts')
</body>
</html>
