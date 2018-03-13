<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="utf-8" />

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <title>掲示板</title>

    <!-- css -->
    <style type="text/css">

        header {
            position: fixed;
            top: 0;
            left: 0px;                  /* 位置(右0px) */
            background-color:#F6AB00;     /* 背景色(黒) */
            height:112px;              /* 縦の高さ112px */
            width:100%;                /* 横の幅を100% */
            z-index: 1;
        }

        body{
            padding:120px;
            z-index: 2;
        }

    </style>
</head>

<body>
<header>

    <!-- タイトル -->
    <font color="#f5f5f5">
        <div align="center"><h1><a href="http://0.0.0.0:8000/bbc" title="掲示板">掲示板</a></h1></div>
    </font>

    <!-- 新規投稿ボタン -->
    <h3>
        <div align="right">
            <input type="button" onclick="location.href='http://0.0.0.0:8000/post'"value="新規投稿">
        </div>
    </h3>

</header>

@yield('content')

</body>
</html>