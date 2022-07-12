<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap core CSS -->
    <link href="{{asset("css/bootstrap.min.css")}}" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="{{asset("css/common.css")}}" rel="stylesheet" />
    <style>
      div#footer {
        background-color: #ffffff;
        width: 100%;
        position: fixed;
        bottom: 0;
        left: 0;
      }
      ul.nav {
        float: center;
        list-style: none;
        width: 45%;
      }
      ul.nav li {
        float: center;
      }
      ul.nav a {
        line-height: 40px;
        color: #ffffff;
        padding: 0 15px;
        text-decoration: none;
      }
    </style>
    <title>@yield('title')</title>
  </head>
  <body>
    <!-- Navigation -->
    <div
      class="d-flex flex-column flex-md-row p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm"
    >
      <div class="col-sm"></div>
      <div class="col-sm text-center">
        <h3 class="my-0 mr-md-auto font-weight-normal">{{isset($title) ? $title : ""}}</h3>
      </div>
      <div class="d-flex flex-column flex-md-row col-sm">
        <ul class="navbar-nav ml-auto user-nav">
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="dropdown01"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
              >hogehoge</a
            >
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="pwreset.html">パスワード変更</a>
              <a class="dropdown-item" href="#">ヘルプ</a>
              <a class="dropdown-item" href="login.html">ログアウト</a>
            </div>
          </li>
        </ul>
        <a class="btn btn-outline-primary setting-btn" href="setting.html"
          >各種設定</a
        >
      </div>
    </div>

    @yield("content")

    <br><br><br><br>
    <!-- Footer -->
    <div id="footer">
      <div class="navbar navbar-expand-sm bg-light justify-content-center">
        <ul class="nav justify-content-center">
          <li>Copyright &copy; NEXT Co., Ltd. All Rights Reserved.</li>
        </ul>
      </div>
    </div>
  
      <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"
      >
       </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      
      <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>

      <!-- Custom js -->
      <script type="text/javascript" src="{{asset("js/common.js")}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/libphonenumber-js/1.1.10/libphonenumber-js.min.js"></script>
      <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
      @stack("js")
    </body>
  </html>  