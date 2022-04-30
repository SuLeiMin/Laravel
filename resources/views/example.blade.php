<?php
$list = array(
    0 => 'Rohan',
    1 => 'Arjun',
    2 => 'Niharika',
    3 => 'Rohan',
    4 => 'Arjun',
    5 => 'Niharika',
    6 => 'Rohan',
    7 => 'Arjun',
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br>
                <h3><center>契約企業一覧</center></h3>
                <p style="float: right;">
                    aa
                </p>
                <p style="float: right;">
                    aa
                </p>
        </nav>
        <br><br>
        <div class="form-group">
            <input type="text" name="search" placeholder="Search"　class="form-control">
            <button>Search</button>
            <br><br>
                <a href="#" class="btn btn-primary">登録</a>
                <a href="#" class="btn btn-primary">編集</a>
                <a href="#" class="btn btn-primary">削除</a>
            <br><br>
            <button name="executeCsv" id="" style="float: right;">データ出力</button>
            <br><br>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>企業ID</th>
                        <th>契約企業名</th>
                        <th>郵便番号</th>
                        <th>住所1</th>
                        <th>住所2</th>
                        <th>TEL</th>
                        <th>部署1</th>
                        <th>部署2</th>
                        <th>OOO</th>
                        <th>OOO</th>
                        <th>OOO</th>
                        <th>OOO</th>
                        <th>OOO</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
</body>
</html>