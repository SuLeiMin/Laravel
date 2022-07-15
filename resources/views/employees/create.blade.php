@extends('layouts.employee', ["title" => "従業員登録"])
@section('title','従業員登録')
@section('content')

<div class="container">
    <form class="text-left">
      <input type="hidden" name="employee_id" id="employee_id" value="9999" />
      <div class="form-signin">
        <div class="form-group row">
          <div class="col-sm-3">
            <button
              type="button"
              id="save_btn"
              class="btn btn-lg btn-primary btn-block"
            >
              保存
            </button>
          </div>
          <div class="col-sm-3">
            <button
              type="button"
              id="delete_btn"
              class="btn btn-lg btn-primary btn-block"
            >
              削除
            </button>
          </div>
          <div class="col-sm-4">
            <button
              type="button"
              id="cancel_btn"
              class="btn btn-lg btn-secondary btn-block"
            >
              キャンセル
            </button>
          </div>
          <div class="col-sm-4 text-center">
            <span class="required">※</span>は必須項目
          </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-2 form-label text-left">
          <p>契約企業</p>
        </div>
        <div class="col-sm-4 form-text-offset">
          <p>
            <span>999999　NEXT株式会社　関西支社</span>
          </p>
        </div>
      </div>
      <div class="form-group row">
        <label
          for="employee_email"
          class="col-sm-2 col-form-label form-label text-left"
          >労働者ID<span class="required">※</span></label
        >
        <div class="col-sm-4">
          <input
            type="text"
            name="employee_email"
            id="employee_email"
            class="form-control"
            title="労働者ID"
            placeholder="xxx@xxxxxx.co.jp"
            required
          />
        </div>
      </div>
      <div class="form-group row">
        <label
          for="employee_name"
          class="col-sm-2 col-form-label form-label text-left"
          >労働者氏名<span class="required">※</span></label
        >
        <div class="col-sm-4">
          <input
            type="text"
            name="employee_name"
            id="employee_name"
            class="form-control"
            title="労働者氏名"
            placeholder=""
            required
          />
        </div>
      </div>

      <div class="form-group row">
        <label
          for="employee_email"
          class="col-sm-2 col-form-label form-label text-left"
          >パスワード<span class="required">※</span></label
        >
        <div class="col-sm-4">
          <input
            type="password"
            name="password"
            id="password"
            class="form-control"
            title="パスワード"
            required
          />
        </div>
      </div>

      <div class="form-group row">
        <label
          for="department1"
          class="col-sm-2 col-form-label form-label text-left"
          >部署1<span class="required">※</span></label
        >
        <div class="col-sm-4">
          <input
            type="text"
            name="department1"
            id="department1"
            class="form-control"
            title="部署1"
            placeholder=""
            required
          />
        </div>
      </div>
      <div class="form-group row">
        <label
          for="department2"
          class="col-sm-2 col-form-label form-label text-left"
          >部署2</label
        >
        <div class="col-sm-4">
          <input
            type="text"
            name="department2"
            id="department2"
            class="form-control"
            title="部署2"
            placeholder=""
          />
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-2 form-label text-left">
          <p>登録メール通知</p>
        </div>
        <div class="col-sm-5 form-text-offset">
          <label>
            <input
              type="checkbox"
              name="email_send"
              id="email_send"
              class=""
              value="1"
            />
            <span>通知する</span>
          </label>
        </div>
      </div>
    </form>
  </div>
  @push("js")
    <script>
      $(function () {
        // 保存
        $("#save_btn").on("click", function () {
            if ($("#email_send:checked").val()) {
                if (!confirm("登録内容をメール通知しますか？")) {
                  alert("保存されました。");
                  return false; 
                }
            }
            if (!confirm("登録内容を保存しますか？")) {
                // キャンセル
                return false;
            }
            if($("#name").val() || $("#zip_code").val() || $("#address1").val() || $("#address2").val() || 
               $("#telephone").val() || $("#dept1").val() || $("#dept2").val() || $('#in_charge_id:selected').text()||
               $('#payment_method:selected').text() || $('#billingdate:selected').text()|| $('#paymentdate:selected').text()||
               $("#remark").val()||$("#remark2").val()||$("#remark3").val() != ''){

                  alert("保存されました。");
            }
            $("#form").submit();    
        });
        // キャンセル
        $("#cancel_btn").on("click", function () {
        location.href = "{{route("employees.index")}}";
        });

        // 担当者追加
        $("#add_tantousya_btn").on("click", function () {
        location.href = "./tantousya.html";
        });

        // 担当者修正
        $("#edit_tantousya_btn").on("click", function () {
        location.href = "./tantousya.html";
        });
      
        // 削除処理
        $("#delete_btn").on("click", function () {
          if (!confirm("本当に削除しますか？")) {
            // キャンセル
            return false;
          } else {
            // 実行
            alert("就業中の契約があるため削除できません。");
            return false;
          }
        });
      });

      $(function(){
        if ( localStorage.getItem('entry_btn') !== null ) {
          $("#delete").css('display', 'none');
        }
      });
    </script>
@endpush
@endsection