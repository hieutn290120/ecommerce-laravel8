<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ url('/css/main.css') }}" rel="stylesheet">
    <link href="{{ url('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ url('/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ url('/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ url('/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ url('/css/prettyPhoto.css') }}" rel="stylesheet">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta content="" name="copyright">
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="ja" http-equiv="Content-Language">
    <meta content="text/css" http-equiv="Content-Style-Type">
    <meta content="text/javascript" http-equiv="Content-Script-Type">
    <meta id="viewport" name="viewport" content="" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <title>Ohana</title>
    <link type="text/css" rel="stylesheet" href="{{asset('rate/rate/css/rate.css')}}">
    <script type="text/javascript">
        //<![CDATA[
        function OpenPopup(Url,WindowName,width,height,extras,scrollbars) {
        var wide = width;
        var high = height;
        var additional= extras;
        var top = (screen.height-high)/2;
        var leftside = (screen.width-wide)/2; newWindow=window.open(''+ Url + 
        '',''+ WindowName + '','width=' + wide + ',height=' + high + ',top=' + 
        top + ',left=' + leftside + ',features=' + additional + '' + 
        ',scrollbars=1');
        newWindow.focus();
        }
        //]]>
    </script>
    <title>Document</title>
</head>
<body>
    @include('frontend.layouts.header')

    @include('frontend.layouts.slide')

    <section>
        <div class='container'>
            <div class="row">
                @include('frontend.layouts.menu-left')
                <div class="col-sm-9 padding-right">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>
    @include('frontend.layouts.footer')
    <script src="{{ url('/js/jquery.js') }}"></script>
    <script src="{{ url('/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{asset('rate/rate/js/jquery-19.1.min.js')}}"></script>
    <script src="{{asset('js/jquery.prettyPhoto.js')}}"></script>


    
</body>
</html>