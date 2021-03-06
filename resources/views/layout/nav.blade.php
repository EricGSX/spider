<style>
    .nav>li>a:hover{
        background-color: #2e6da4!important;
    }
    .nav>li>a{
        font-weight: bold!important;
        color: white!important;
        padding: 16px 10px!important;
    }
    .blog-nav-item {
        color:white!important;
    }
    .nav .open>a, .nav .open>a:focus, .nav .open>a:hover{
        background-color: #2e6da4!important;
    }
</style>
<div class="blog-masthead">
    <div class="container top_con_phone">
        <form action="/posts/search" method="GET">
            <ul class="nav navbar-nav navbar-left">
                <li class="eric-li">
                    <img src="{{asset('image/gsx-logo.png')}}" style="width:70px;height:50px;cursor: pointer;" onclick="javascript:window.location.href='/'">
                </li>
                <li class="eric-li">
                    <a class="blog-nav-item search_hide" href="https://ding.guosx.com/">幸福日记</a>
                </li>
                @foreach($topics as $topic)
                <li class="eric-li">
                    <a class="blog-nav-item search_hide" href="/categories/{{$topic->id}}">{{$topic->name}}</a>
                </li>
                @endforeach
                <li class="eric-li">
                    <a class="blog-nav-item" href="/tottles/show"  title="碎碎念">碎碎念</a>
                </li>
                @auth
                @if((\Auth::user()->id == 1) || (\Auth::user()->id == 2))
                <li class="eric-li">
                    <a class="blog-nav-item glyphicon glyphicon-volume-up" href="/notices" title="通知&公告"></a>
                </li>
                <li class="eric-li">
                    <a class="blog-nav-item search_hide glyphicon glyphicon-pencil" href="/posts/create"></a>
                </li>
                @endif
                @endauth
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <input name="s" type="text" value="" class="form-control" style="margin-top:10px;width:150px;" placeholder="Search..." id='search_head' onfocus="deal_search()" onblur="cancel_deal_search()">
                </li>
                <li>
                    <button class="btn btn-default" style="margin-top:10px" type="submit">Go!</button>
                </li>
                <li>
                    <span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                </li>
                <li class="dropdown">
                    <div>
                @auth
                    <img src="{{\Auth::user()->user_img}}" alt="" class="img-rounded" style="border-radius:500px; height: 30px;">
                    <a href="#" class="blog-nav-item dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{\Auth::user()->name}}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/users/{{\Auth::user()->id}}">我的主页</a></li>
                        <li><a href="/users/me/setting">个人设置</a></li>
                        @if((\Auth::user()->id == 1) || (\Auth::user()->id == 2))
                        <li><a href="/tottles/create">碎碎叨叨</a></li>
                        @endif
                        <li><a href="/users/logout">登出</a></li>
                    </ul>
                @endauth
                @guest
                    <li><a href="/users/login">登陆</a></li>
                @endguest
                    </div>
                </li>
            </ul>
        </form>
    </div>
</div>
<script>
   function deal_search(){
       $("#search_head").css({"width":"300px"})
       $('.search_hide').hide()
   }
   function cancel_deal_search(){
       $("#search_head").css({"width":"150px"})
       $('.search_hide').show()
   }
</script>