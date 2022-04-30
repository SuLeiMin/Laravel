<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ファイルの保存</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <form action="#" method="GET">
                ファイルの名前<input type="text" class="form-control" name="file-name">
                <br>
                ファイルの場所<input type="file" class="form-control" name="file-place">
                <br>
                <button  name="save" class="btn btn-primary">保存</button>
                <button　name="cancel" class="btn btn-primary">キャンセル</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>