<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <!-- Bootstrap core CSS -->
    <link href="{{asset("css/bootstrap.min.css")}}" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="{{asset("css/common.css")}}" rel="stylesheet" />
    <style></style>
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

    <!-- Footer -->
    <div class="container">
        <footer>
          <p class="text-center text-muted">
            Copyright &copy; NEXT Co., Ltd. All Rights Reserved.
          </p>
        </footer>
      </div>
  
      <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"
      >
       </script>
      <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous">
      </script>

      <!-- Custom js -->
      <script type="text/javascript" src="{{asset("js/common.js")}}"></script>
      @stack("js")
    </body>
  </html>  