<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <style>
        .box{
            width: 220px;
            border:1px solid #a22;
            padding: 1px;
            margin-bottom: 8px;
        }
        .box h3{
            color: #fff;
            background: #c22;
            padding:8px;
            margin:0;
            cursor: pointer;
        }
        .box h3.up{
            color:#d99;
        }
        .box a{
            color: #900;
        }
    </style>
    
</head>
<body>
    <div class="box">
        <h3>Products</h3>
        <ul>
            <li><a href="#">Icon Pack</a></li>
            <li><a href="#">Icon Pack</a></li>
            <li><a href="#">Icon Pack</a></li>
        </ul>
    </div>
    <div class="box">
        <h3>Services</h3>
        <ul>
            <li><a href="#">Icon Pack</a></li>
            <li><a href="#">Icon Pack</a></li>
            <li><a href="#">Icon Pack</a></li>
        </ul>
    </div>
    <div class="box">
        <h3>Connect</h3>
        <ul>
            <li><a href="#">Icon Pack</a></li>
            <li><a href="#">Icon Pack</a></li>
            <li><a href="#">Icon Pack</a></li>
        </ul>
    </div>
    <script>
        $("h3").click(function(){
            var parent = $(this).parent();
            $("ul",parent).slideToggle("fast");
            $(this).toggleClass("up");
        })
    </script>
</body>
</html>