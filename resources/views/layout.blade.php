<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    {{--<link rel="stylesheet" href="{{asset('css/libs/sweetalert.css')}}">--}}

    <link rel="stylesheet" href="/css/libs/bootstrap.css">
    {{--<link rel="stylesheet" href="{{asset('css/app.css')}}"/>--}}
    <link rel="stylesheet" href="/css/libs/sweetalert.css">
    <link rel="stylesheet" href="/css/libs/dropzone.css">
    <link rel="stylesheet" href="/css/libs/lity.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/themify-icons/themify-icons.css">
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top navbar-dubem">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">ProjectFlyer</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
            @if($isSignedIn)
                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="ti ti-user"> </span>Hello, {{$user->name}}<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/flyers">All Flyers</a>
                            </li>

                            <li>
                                <a href="{{route('logout')}}">Sign Out</a>
                            </li>
                        </ul>



                    </li>
                </ul>
                {{--<div class="navbar-right ti ti-user">--}}
                {{--<div class="dropdown">--}}
                    {{--<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">--}}
                        {{--Hello, {{$user->name}}--}}
                        {{--<span class="caret"></span>--}}
                    {{--</button>--}}
                    {{--<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">--}}
                        {{--<li><a href="#">Action</a></li>--}}
                        {{--<li><a href="#">Another action</a></li>--}}
                        {{--<li><a href="#">Something else here</a></li>--}}
                        {{--<li role="separator" class="divider"></li>--}}
                        {{--<li><a href="#">Separated link</a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
                    {{--</div>--}}

                @endif
        </div><!--/.nav-collapse -->
    </div>
</nav>



    <div class="container">
        @yield('content')
    </div>

{{--<script src="{{asset('js/libs/sweetalert.min.js')}}"></script>--}}
<script src="https://checkout.simplepay.ng/simplepay.js"></script>
<script src="/js/libs/sweetalert.min.js"></script>
<script src="/js/libs/jquery-1.10.2.min.js"></script>
<script src="/js/libs/bootstrap.js"></script>
<script src="/js/libs/lity.js"></script>

<script>
    @if(session()->has('flash_message'))

    swal({   title: "{{ session('flash_message.title') }}",   text: "{{session('flash_message.text')}}",   type: "{{session('flash_message.type')}}",  timer:1800, showConfirmButton:false });

    @endif
</script>
  @yield('section.footer')

</body>
</html>