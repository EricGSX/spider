<!doctype html>
<html lang = "{{ app()->getLocale() }}" xmlns:v-bind = "http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Spider</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        {{--VUE--}}
        <script type="text/javascript" src="{{asset('js/vue.js')}}"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
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
                position: absolute;
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
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>
                            <a href="{{ route('register') }}">Register</a>
                            @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Spider
                </div>

                <div class="links" id="app" style='position: relative;'>
                    <a :href='url1'>@{{msg1}}</a>
                    <a :href='url2'>@{{msg2}}</a>
                    <a style="position: absolute; right: -150px;bottom: 118px;" href='https://gitee.com/EricGuosx/laravel-crawler'><img src='https://gitee.com/EricGuosx/laravel-crawler/widgets/widget_3.svg' alt='Fork me on Gitee'></img></a>
                </div>

            </div>
        </div>
    </body>
</html>
    <script type="text/javascript">
      new Vue({
          el: '#app',
          data: {
              msg1: 'gitee',
              url1:'spider/gitee',
              msg2: 'zhihu',
              url2:'spider/zhihu',
          }
      })
 </script>