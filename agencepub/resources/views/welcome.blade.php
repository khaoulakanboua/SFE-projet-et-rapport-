<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: center;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: hotpink;
                padding: 0 25px;
                font-size: 30px;
                font-weight: 600;
                letter-spacing: .5rem;
                text-decoration: none;
                text-transform: uppercase;
                font-family: 'Arial'
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            

            <div class="content">
                <div class="slotholder" style="position: absolute; top: 0px; left: 0px; z-index: 0; width: 100%; height: 100%; backface-visibility: hidden; transform: translate3d(0px, 0px, 0px); visibility: inherit; opacity: 1;"><div class="tp-bgimg defaultimg" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url(&quot;http://www.fes-marketing.net/wp-content/uploads/2016/08/creation-graphique-br.jpg&quot;); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit; z-index: 20;" src="http://www.fes-marketing.net/wp-content/uploads/2016/08/creation-graphique-br.jpg">
                    <br>@if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            
            <h5 style="font-family: Cursive, sans-serif; font-size: 50px; color: pink;">Bienvenue dans Génération Pub</h5>
            <img src="http://fes-marketing.net/wp-content/uploads/2016/08/objet-1-2.png" alt="" data-ww="912px" data-hh="403px" data-no-retina="" style="width: 912px; height: 350px; transition: none 0s ease 0s; line-height: 0px; border-width: 0px; margin: 0px; padding: 0px; letter-spacing: 0px; font-weight: 400; font-size: 14px;"> <div class="title m-b-md">
                   </div></div>
                
                
                     </div>             

            </div>
        </div>
    </body>
</html>
