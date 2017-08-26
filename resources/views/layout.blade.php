<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <title>@yield('title')</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ URL::asset('bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  @yield('css')
  <link rel="stylesheet" href="{{ URL::asset('dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('dist/css/skins/_all-skins.min.css') }}">

</head>
<body class="hold-transition skin-blue-light sidebar-mini">

    <div class="wrapper">

        @include('header')

        @include('sidebar')

        <div class="content-wrapper">
            <section class="content">
                <div class="row">
                     <div class="col-xs-12">
                        <div class="box">
                            @yield('content')
                            
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>

    <script src="{{ URL::asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ URL::asset('plugins/fastclick/fastclick.js') }}"></script>
    <script src="{{ URL::asset('dist/js/app.min.js') }}"></script>
    @yield('js')
</body>
</html>
