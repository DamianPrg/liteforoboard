@inject('auth', 'App\Auth')
        <!DOCTYPE>
<html>
<head>
    <title>@yield('head.title', '')</title>

    <!-- css -->

    <!-- Bootstrap 3.3.4 -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <link type="text/css" rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">

    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <!-- Ionicons -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css"/>

    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/default/styles.css')}}">
    <link type="text/css" rel="stylesheet" href="{{URL::asset('css/framework.css')}}">
        <link type="text/css" rel="stylesheet" href="{{URL::asset('css/base.css')}}">



    <!-- css -->

    <!-- js -->
    <script src="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
    <!-- js -->

    <script src="//cdn.ckeditor.com/4.5.3/standard/ckeditor.js"></script>


    <script>
        @yield('head.script')


        $(document).ready(function () {
                    $('[data-toggle="tooltip"]').tooltip();

                });

    </script>
</head>

<body>
<div class='wrapper'>

    <header class='header'>
        LiteForo
    </header>


</div>
<!-- wrapper -->
<div class='wrapper wrapper-styled'>


    <nav class='nav nice-link-color'>
        <a href='{{route('index')}}'>Forums</a>


        @if($auth->isUserLogged())

            <span class='dropdown'>
					<a data-toggle="dropdown" href='#'>{{ $auth->getLoggedUser()->username }}</a>

					<ul class='dropdown-menu' style='padding:0;margin:0;text-align: center;'>
                        <li><a href='{{route('acp.dashboard')}}'>
                                AdminCP
                            </a></li>
                        <li>
                            <a href='{{url('/logout')}}'>Logout</a>
                        </li>
                    </ul>
				</span>

        @endif


    </nav>


    @if($auth->isUserLogged())
        @yield('wrapper-top-logged')
    @else
        @yield('wrapper-top')
    @endif


    <div class='_secondaryMenu' style='padding:10px; text-align:right;'>
        <div class='_tools wrapper-margin'>
            <!-- <a href='#' class='btn btn-black'><i class="fa fa-plus fa-fw"></i> Create Thread</a> -->
            @if($auth->isUserLogged())
                @yield('tools-logged')

                @if($auth->getLoggedUser()->isStaff())
                    @yield('tools-staff')
                @endif
            @else
                @yield('tools')
            @endif
        </div>
    </div>


    <div class='content'>


        <div class='main' id='main_content'>
            @yield('content')
        </div>

        <aside class='side'>
            @yield('side')
        </aside>
    </div>

    <div clas='clearfix'></div>

    <div class='_secondaryMenu' style='padding:10px; text-align:right;'>
        <div class='_tools wrapper-margin'>
            <!-- <a href='#' class='btn btn-black'><i class="fa fa-plus fa-fw"></i> Create Thread</a> -->
            @yield('tools')
        </div>
    </div>

    @if($auth->isUserLogged())
        @yield('wrapper-bottom-logged')
    @else
        @yield('wrapper-bottom')
    @endif


</div>
<!-- wrapper -->
<div class='wrapper wrapper-footer '>
    <footer class='footer'>
        <div class='left'>
            <div><i class="fa fa-link fa-fw"></i> Quick links</div>
            <nav class='footer-nav'>
                <div>
                    <i class='fa fa-fw'></i>
                    <a href='{{route('index')}}'>Forums</a></div>
                <div>
                    <i class='fa fa-fw'></i>
                    <a href='#'>Staff</a></div>
                <div>
                    <i class='fa fa-fw'></i>
                    <a href='#'>Contact</a></div>
            </nav>
        </div>

        <div class='mid'>
            @include('skins.default.layouts.includes.footer-user-links')
        </div>

        <div class='right'>
            Powered by LiteForo
        </div>
    </footer>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="{{URL::asset('js/scripts.js')}}"></script>

<script>
    CKEDITOR.replace('message', {removePlugins: 'elementspath'});
    CKEDITOR.on('instanceReady', function (e) {
        $('#cke_1_top').css('background', '#eee');
    });
</script>
</body>
</html>