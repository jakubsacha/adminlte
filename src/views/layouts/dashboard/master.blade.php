<html>
    <head>
        <meta charset="UTF-8">
        <title>{{ (!empty($siteName)) ? $siteName : "Syntara"}} - {{isset($title) ? $title : '' }}</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="{{ asset("packages/jakubsacha/adminlte/AdminLTE/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="{{ asset("packages/jakubsacha/adminlte/AdminLTE/css/font-awesome.min.css") }}" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="{{ asset("packages/jakubsacha/adminlte/AdminLTE/css/ionicons.min.css") }}" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="{{ asset("packages/jakubsacha/adminlte/AdminLTE/css/morris/morris.css") }}" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="{{ asset("packages/jakubsacha/adminlte/AdminLTE/css/jvectormap/jquery-jvectormap-1.2.2.css") }}" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href="{{ asset("packages/jakubsacha/adminlte/AdminLTE/css/fullcalendar/fullcalendar.css") }}" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="{{ asset("packages/jakubsacha/adminlte/AdminLTE/css/daterangepicker/daterangepicker-bs3.css") }}" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="{{ asset("packages/jakubsacha/adminlte/AdminLTE/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css") }}" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{{ asset("packages/jakubsacha/adminlte/AdminLTE/css/AdminLTE.css") }}" rel="stylesheet" type="text/css" />
        
        <!-- jakubsacha css fix -->
        <link href="{{ asset("packages/jakubsacha/adminlte/css/AdminLTE.css") }}" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        @if (!empty($favicon))
        <link rel="icon" {{ !empty($faviconType) ? 'type="$faviconType"' : '' }} href="{{ $favicon }}" />
        @endif

        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
        
        <script src="{{ asset('packages/mrjuliuss/syntara/assets/js/dashboard/base.js') }}"></script>

    </head>
    <body class="skin-blue fixed">
        @include(Config::get('syntara::views.header'))

        <div class="wrapper row-offcanvas row-offcanvas-left">
            @include(Config::get('adminlte::views.left'))

            @include(Config::get('adminlte::views.content'))

        </div>

        <!-- jQuery UI 1.10.3 -->
        <script src="{{ asset("packages/jakubsacha/adminlte/AdminLTE/js/jquery-ui-1.10.3.min.js") }}" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="{{ asset("packages/jakubsacha/adminlte/AdminLTE/js/bootstrap.min.js") }}" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="{{ asset("packages/jakubsacha/adminlte/AdminLTE/js/plugins/morris/morris.min.js") }}" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="{{ asset("packages/jakubsacha/adminlte/AdminLTE/js/plugins/sparkline/jquery.sparkline.min.js") }}" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="{{ asset("packages/jakubsacha/adminlte/AdminLTE/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js") }}" type="text/javascript"></script>
        <script src="{{ asset("packages/jakubsacha/adminlte/AdminLTE/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js") }}" type="text/javascript"></script>
        <!-- fullCalendar -->
        <script src="{{ asset("packages/jakubsacha/adminlte/AdminLTE/js/plugins/fullcalendar/fullcalendar.min.js") }}" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{ asset("packages/jakubsacha/adminlte/AdminLTE/js/plugins/jqueryKnob/jquery.knob.js") }}" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="{{ asset("packages/jakubsacha/adminlte/AdminLTE/js/plugins/daterangepicker/daterangepicker.js") }}" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="{{ asset("packages/jakubsacha/adminlte/AdminLTE/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js") }}" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="{{ asset("packages/jakubsacha/adminlte/AdminLTE/js/plugins/iCheck/icheck.min.js") }}" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="{{ asset("packages/jakubsacha/adminlte/AdminLTE/js/AdminLTE/app.js") }}" type="text/javascript"></script>
        <script src="{{ asset("packages/jakubsacha/adminlte/js/app.js") }}" type="text/javascript"></script>

    </body>
</html>
