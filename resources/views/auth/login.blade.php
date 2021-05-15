<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>تسجيل الدخول</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    {{-- Begin Metronic --}}
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('metronic/assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('metronic/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('metronic/assets/global/plugins/bootstrap/css/bootstrap-rtl.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('metronic/assets/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css') }}"
        rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('metronic/assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('metronic/assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet"
        type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ asset('metronic/assets/global/css/components-rtl.min.css') }}" rel="stylesheet" id="style_components"
        type="text/css" />
    <link href="{{ asset('metronic/assets/global/css/plugins-rtl.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->

    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <link href="{{ asset('metronic/assets/pages/css/login-3-rtl.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL SCRIPTS -->

    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <!-- END THEME LAYOUT SCRIPTS -->

    {{-- End Metronic --}}
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body dir="rtl" class="login">
    <div class="content" style="margin-top: 150px;">
        <!-- BEGIN LOGIN FORM -->
        <form class="login-form" action="{{ $route }}" method="POST">
            @csrf
            <h3 class="form-title">تسجيل الدخول</h3>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
    
            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">البريد الإلكتروني</label>
                <div class="input-icon">
                    <i class="fa fa-envelope"></i>
                    <input class="form-control placeholder-no-fix" type="email" placeholder="Email"
                        name="email" /> </div>
            </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">كلمة المرور</label>
                <div class="input-icon">
                    <i class="fa fa-lock"></i>
                    <input class="form-control placeholder-no-fix" type="password" placeholder="Password"
                        name="password" /> </div>
            </div>
            <div class="form-actions">
                <label class="rememberme mt-checkbox mt-checkbox-outline">
                    <input type="checkbox" name="remember" value="1" /> تذكرني
                    <span></span>
                </label>
                <button type="submit" class="btn green pull-right"> دخول </button>
            </div>
        </form>
        <!-- END LOGIN FORM -->
    </div>

    <!--[if lt IE 9]>
        <script src="../assets/global/plugins/respond.min.js"></script>
        <script src="../assets/global/plugins/excanvas.min.js"></script> 
        <script src="../assets/global/plugins/ie8.fix.min.js"></script> 
    <![endif]-->

    <!-- BEGIN CORE PLUGINS -->
    <script src="{{ asset('metronic/assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('metronic/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('metronic/assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('metronic/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('metronic/assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('metronic/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('metronic/assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}"
    type="text/javascript"></script>
    <script src="{{ asset('metronic/assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}"
    type="text/javascript"></script>
    {{-- <script src="{{ asset('metronic/assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script> --}}
    <!-- END PAGE LEVEL PLUGINS -->

    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{ asset('metronic/assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    {{-- <script src="{{ asset('metronic/assets/pages/scripts/login.min.js') }}" type="text/javascript"></script> --}}
    <!-- END PAGE LEVEL SCRIPTS -->

    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <!-- END THEME LAYOUT SCRIPTS -->

    {{-- <script src="{{ asset('assets/js/main.js') }}"></script> --}}
    <script>
        $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });
            })
    </script>
</body>

</html>