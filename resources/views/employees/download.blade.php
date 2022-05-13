@extends('layouts.app', ["title" => ""])
	
@section('content')
    <div class="container">
    <form class="text-left" id="form" action="{{route("employees.store")}}" method="POST">
		<div class="form-group"> 
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label form-label"
                  >ファイルの名前</label>
                <div class="col-sm-4">
                  <input
                    type="text"
                    name="name"
                    value=""
                    id="name"
                    class="form-control"
　                   required
                  />
                </div>
		    </div>
        <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label form-label"
                  >ファイルの場所</label>
                <div class="col-sm-4">
                  <input
                    type="file"
                    name="name"
                    value=""
                    id="name"
                    class="form-control"
　                   required
                  />
                </div>
		    </div>
            <center>
            <a href="" class="btn btn-primary" id="save_btn">
                保存
            </a>
            <button type="button" class="btn btn-primary" id="cancel_btn">
                キャンセル
            </button>   
            </center> 
        </div>
    </form>
    </div>
    @push("js")
    <script>
    $(function () {
        // 保存
        $("#save_btn").on("click", function () {
          $("#form").submit();
        });
        // キャンセル
        $("#cancel_btn").on("click", function () {
        location.href = "{{route("employees.index")}}";
        });
    });
    </script>
@endpush

@endsection