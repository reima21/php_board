@extends('layouts.default')
@section('content')

    <meta charset="UTF-8">

    <!-- css -->
    <style>
        div.btnLeft{
            text-align: left;
            float: left;
        }

        div.btnRight{
            text-align: right;
        }
    </style>


    <div class="col-xs-8 col-xs-offset-2">

    {{ Form::open(['route' => 'bbc.store'], array('class' => 'form')) }}

    <!-- 投稿完了時にフラッシュメッセージを表示 -->
        @if(Session::has('message'))
            <div class="bg-info">
                <p>{{ Session::get('message') }}</p>
            </div>
        @endif

    <!-- エラーメッセージの表示 -->
        @foreach($errors->all() as $message)
            <p class="bg-danger">{{ $message }}</p>
        @endforeach


        <div class="form-group">
            <label for="title" class="">名前</label>
            <div class="">
                {{ Form::text('name', null, array('class' => '')) }}
            </div>
        </div>

        <div class="form-group">
            <label for="title" class="">タイトル</label>
            <div class="">
                {{ Form::text('title', null, array('class' => '')) }}
            </div>
        </div>


        <div class="form-group">
            <label for="aaa" class="">内容</label>
            <div class="">
                {{ Form::textarea('content', null, array('id' => 'content')) }}
            </div>
        </div>





        <!--   投稿ボタン   -->
        <div class="form-group" align="right">

            <!-- モーダルウィンドウを呼び出すボタン -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="modal_confirm">投稿</button>

            <!-- モーダルウィンドウの中身 -->
            <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                            <!-- 確認メッセージ -->
                            <center>
                                <h4 class="modal-title">この内容で投稿します。<br>よろしいですか。</h4>
                            </center>
                        </div>

                        <!-- 投稿内容 -->
                        <div id="modal_content" class="modal-body">
                            <script>
                                $(function (){
                                    $("#modal_confirm").on("click", function(){
                                        var content_value = $("#content").val();
                                        $("#modal_content").html(content_value);
                                    });
                                });
                            </script>
                        </div>19

                        <div class="modal-footer">

                            <!-- 左寄せキャンセルボタン -->
                            <div class="btnLeft">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">キャンセル</button>
                                </div>
                            </div>

                            <!-- 右寄せOKボタン -->
                            <div class="btnRight">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div align="left">
            <input type="button" onclick="location.href='http://0.0.0.0:8000/bbc'"value="掲示板に戻る">
        </div>


        {{ Form::close() }}
    </div>

@stop