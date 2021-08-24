<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-132456884-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-132456884-1');
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title')</title>
    <!-- Google font -->
    <!-- Custom stlylesheet -->
    <style>
        @font-face {
            font-family: 'Montserrat';
            src: url('{{asset('fonts/other/Montserrat-ExtraBolditalic.eot')}}');
            src: url('{{asset('fonts/other/Montserrat-ExtraBold.eot?#iefix')}}') format('embedded-opentype'),
            url('{{asset('fonts/other/Montserrat-ExtraBold.woff2')}}') format('woff2'),
            url('{{asset('fonts/other/Montserrat-ExtraBold.woff')}}') format('woff');
            font-weight: 800;
        }
        @font-face {
            font-family: shabnamFD;
            font-style: normal;
            font-weight: 300;
            src: url('{{asset('fonts/shabnam/Shabnam-FD.eot')}}');
            src: url('{{asset('fonts/shabnam/Shabnam-FD.eot?#iefix')}}') format('embedded-opentype'),  /* IE6-8 */
            url('{{asset('fonts/shabnam/Shabnam-FD.woff2')}}') format('woff2'),  /* FF39+,Chrome36+, Opera24+*/
            url('{{asset('fonts/shabnam/Shabnam-FD.woff')}}') format('woff'),  /* FF3.6+, IE9, Chrome6+, Saf5.1+*/
            url('{{asset('fonts/shabnam/Shabnam-FD.ttf')}}') format('truetype');
        }

        * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            padding: 0;
            margin: 0;
            direction: rtl;
        }

        #notfound {
            display: flex;
            justify-content: center;
            align-items: center;
            align-content: center;
            height: 100vh;
            width: 100%;
            background: url("{{asset('img/bg/voidblocks.jpg')}}") center center /cover;
        }

        .notfound {
            font-family: shabnamFD;
            line-height: 1.4;
            text-align: center;
        }

        .notfound .notfound-404 {
            margin-bottom: 20px;
            z-index: -1;
        }

        .notfound .notfound-404 h1 {
            font-family: 'Montserrat', sans-serif;
            font-style: italic;
            font-size: 224px;
            font-weight: 900;
            padding-right: 32px;
            margin: 0;
            color: #030005;
            text-transform: uppercase;
            text-shadow: -1px -1px 0px #202020, 1px 1px 0px #d4ac00;
            letter-spacing: -20px;
        }


        .notfound .notfound-404 h2 {
            font-family: 'shabnamFD', sans-serif;
            font-size: 36px;
            font-weight: 700;
            color: #fff;
            text-transform: uppercase;
            text-shadow: 0px 2px 0px #171717;
            letter-spacing: 0.02px;
            margin-top: -32px;
            margin-bottom: 64px;
        }

        .notfound a {
            font-family: 'shabnamFD', sans-serif;
            text-transform: uppercase;
            color: #aeaeae;
            text-decoration: none;
            border: 2px solid;
            border-radius: 32px;
            background: transparent;
            padding: 10px 40px;
            font-size: 14px;
            font-weight: 700;
            transition: all .5s;
        }

        .notfound a:hover {
            color: #ffffff;
            border-color: rgba(222, 183, 0, 0.8);
            transition: all .5s;
        }

        @media only screen and (max-width: 767px) {
            .notfound .notfound-404 h2 {
                font-size: 24px;
            }
        }

        @media only screen and (max-width: 480px) {
            .notfound .notfound-404 h1 {
                font-size: 182px;
            }
        }
    </style>
</head>

<body class="shabnamFD">

<div id="notfound">
    <div class="notfound">
        <div class="notfound-404" style="max-width: 600px; padding: 24px;">
            <h1>@yield('errorCode')</h1>
            <h3 style="color: white;margin-bottom: 48px;">@yield('message')</h3>
            <div style="border-radius: 50px">
                @yield('button')
                <a href="/exchange/wallet" class="b-tabs-content btn btn-default btn-round" style="display: inline-block; margin-top: 32px">بازگشت به صفحه اصلی</a>
            </div>
        </div>

    </div>
</div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
