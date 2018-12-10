@extends('layout.main')

@section('content')
<div class="alert alert-success" role="alert">
        下面是搜索"{{$s}}"出现的文章，共{{$posts->total()}}条
    </div>

    <div class="col-sm-8 blog-main">
 @foreach($posts as $post)
            <div class="blog-post">
                <h2 class="blog-post-title"><a href="/posts/{{$post->id}}" >{{$post->title}}</a></h2>
                <p class="blog-post-meta">{{$post->created_at->toFormattedDateString()}} <a href="/user/{{$post->user->id}}">{{$post->user->name}}</a></p>

                {!! str_limit($post->content,100,'...') !!}
                <p class="blog-post-meta">赞 {{$post->zans_count}}  | 评论 {{$post->comments_count}}</p>
            </div>
        @endforeach
     {{$posts->appends(['s' => $s])->links()}}
    </div><!-- /.blog-main -->
@endsection