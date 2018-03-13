@extends('layouts.default')
@section('content')

    <div class="col-xs-8 col-xs-offset-2">

        @foreach($posts as $post)

            <!--投稿表示-->
            <h4><small>投稿日：{{ date("Y年 m月 d日 h時m分s秒",strtotime($post->created_at)) }}</small></h4>
            <h2>{{ $post->title }}</h2><br>
                <h4>{{ $post->content }}</h4><br>
            <p>投稿者　：　{{ $post->name }}</p><br><br>



            <!--投稿に対するコメント表示-->
            @foreach($post->comments as $single_comment)
                <h5><small>投稿日：{{ date("Y年 m月 d日 h時m分s秒",strtotime($single_comment->created_at)) }}</small></h5>
                    <p>{{ $single_comment->content }}</p><br/>
                <small><p>投稿者　：　{{ $single_comment->name }}</p></small>
            @endforeach

            <!-- 返信ボタン -->
            <div align="right">
                <a href="http://0.0.0.0:8000/comment?post_id={{$post->id}}">返信</a>
            </div>

            <hr />

        @endforeach

    </div>

@stop