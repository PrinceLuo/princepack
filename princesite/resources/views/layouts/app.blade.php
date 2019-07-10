<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Font -->
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://cdn.bootcss.com/twitter-bootstrap/4.3.1/css/bootstrap-reboot.min.css" rel="stylesheet">
        <link href="https://cdn.bootcss.com/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('/css/Custom/layouts.css') }}" rel="stylesheet">

        <title>@yield('title')</title>
    </head>
    <body>


        <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('/images/brand/punching.jpg') }}" width="30" height="30" class="d-inline-block align-top" alt="">
                {{ trans('messages.NAVBAR') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">{{ trans('messages.HOME') }} <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">{{ trans('messages.ABOUT') }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ trans('messages.DROPDOWN') }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">{{ trans('messages.CONTACT_US') }}</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="{{ trans('messages.SEARCH') }}" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">{{ trans('messages.SEARCH') }}</button>
                </form>
            </div>
        </nav>

        @yield('content')

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-7">
                        <p>© 2019 Code Cracker by Prince Luo</p>
                    </div>
                    <div class="col-sm-5">
                        <ul class="list-inline ml-auto">
                            <li class="list-inline-item">
                                <!-- WX -->
                                <a href="#">{{ trans('messages.FOOTER_WX') }}</a>
                            </li>
                            <li class="list-inline-item">
                                <!-- Sina -->
                                <a href="#">{{ trans('messages.FOOTER_WEIBO') }}</a>
                            </li>
                            <li class="list-inline-item"    >
                                <!-- QQ -->
                                <a href="#">{{ trans('messages.FOOTER_QQ') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://cdn.bootcss.com/jquery/3.4.1/core.js"></script>
        <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.slim.min.js"></script>
        <script src="https://cdn.bootcss.com/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.bootcss.com/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    </body>
</html>