@extends('layouts.app', ["title" => "契約企業情報"])
@section('title','契約企業情報')
@section('content')
<div class="container">
<form class="text-left" id="form" action="{{route('employees.store')}}" method="post" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="id" id="id" value="999999" />
  
  <div class="form-signin">
    <div class="form-group row">
      <div class="col-sm-3">
        <button
          type="submit"
          id="save_btn"
          class="btn btn-lg btn-primary btn-block"
        >
          保存
        </button>
      </div>
      <div class="col-sm-3" id="delete">
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
    </div>
    <div class="col-sm-4 text-center">
      <span class="required">※</span>は必須項目
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-2 form-label text-left">
      <p>契約企業ID</p>
    </div>
    <div class="col-sm-4 form-text-offset">
      <p>-</p>
    </div>
  </div>
  <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label form-label text-left"
      >企業名<span class="required">※</span></label
    >
    <div class="col-sm-4">
      <input
        type="text"
        name="name"
        id="name"
        class="form-control"
        title="企業名"
        placeholder=""
        required
      />
      @error('name')
        <div class="text-danger"><small>{{$message}}</small></div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="zip_code" class="col-sm-2 col-form-label form-label text-left"
      >郵便番号<span class="required">※</span></label
    >
    <div class="col-sm-4">
      <div class="input-group form-number">
        <input
          type="text"
          name="zip_code"
          id="zip_code"
          class="form-control"
          title="郵便番号"
          placeholder="000-0000"
          aria-label="zipSearch"
          aria-describedby="button-addon4"
          style="border-right: none"
        />
        <div class="input-group-append" id="button-addon4">
          <button
            type="button"
            name="search"
            class="btn btn-outline-secondary form-control"
            style="color: #0d6efd"
            id="search"
            onClick="AjaxZip3.zip2addr('zip_code','','address1','address1');"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              fill="currentColor"
              class="bi bi-search"
              viewBox="0 0 16 16"
            >
              <path
                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"
              ></path>
            </svg>
          </button>
          <p id="error"></p> 
        </div>
      </div>
      @error('zip_code')
        <div class="text-danger"><small>{{$message}}</small></div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="address1" class="col-sm-2 col-form-label form-label text-left"
      >住所1<span class="required">※</span></label
    >
    <div class="col-sm-4">
      <input
        type="text"
        name="address1"
        id="address1"
        class="form-control"
        title="住所1"
        placeholder=""
        style="text-align:right;"
        required
      />
      @error('address1')
      <div class="text-danger"><small>{{$message}}</small></div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="address2" class="col-sm-2 col-form-label form-label text-left"
      >住所2</label
    >
    <div class="col-sm-4">
      <input
        type="text"
        name="address2"
        id="address2"
        class="form-control"
        title="住所2"
        placeholder=""
      />
    </div>
  </div>
  <div class="form-group row">
    <label for="telephone" class="col-sm-2 col-form-label form-label text-left"
      >TEL<span class="required">※</span></label
    >
    <div class="col-sm-4">
      <input
        type="text"
        name="telephone"
        id="telephone"
        class="form-control form-number"
        title="TEL"
        placeholder="00-0000-0000"
        required
      />
      @error('telephone')
      <div class="text-danger"><small>{{$message}}</small></div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="dept1" class="col-sm-2 col-form-label form-label text-left"
      >部署1<span class="required">※</span></label>
    <div class="col-sm-4">
      <input
        type="text"
        name="dept1"
        id="dept1"
        class="form-control"
        title="部署1"
        placeholder=""
        required
      />
      @error('dept1')
      <div class="text-danger"><small>{{$message}}</small></div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="dept2" class="col-sm-2 col-form-label form-label text-left"
      >部署2</label
    >
    <div class="col-sm-4">
      <input
        type="text"
        name="dept2"
        id="dept2"
        class="form-control"
        title="部署2"
        placeholder=""
      />
    </div>
  </div>
  <div class="form-group row">
    <label for="in_charge_id" class="col-sm-2 col-form-label form-label text-left"
      >担当者氏名<span class="required">※</span></label
    >
    <div class="col-sm-3">
      <select
        name="in_charge_id"
        id="in_charge_id"
        class="form-control"
        title="担当者氏名"
      >
        <option value="">担当者氏名</option>
        <option value="9999">9999　富永　暁子</option>
      </select>
      @error('in_charge_id')
      <div class="text-danger"><small>{{$message}}</small></div>
      @enderror
    </div>
    <div class="col-sm-4">
      <button
        type="button"
        id="add_tantousya_btn"
        class="btn btn-primary btn-sm mr-2 px-3"
      >
        登録
      </button>
      <button
        type="button"
        id="edit_tantousya_btn"
        class="btn btn-primary btn-sm px-3"
      >
        編集 . 削除
      </button>
    </div>
  </div>
  <div class="form-group row">
    <label for="payment_method" class="col-sm-2 col-form-label form-label text-left"
      >決済方法</label
    >
    <div class="col-sm-3">
      <select
        name="payment_method"
        id="payment_method"
        class="form-control"
        title="決済方法"
      >
        <option value="">決済方法</option>
        <option value="1">クレジットカード</option>
        <option value="2" selected>請求書発行</option>
        <option value="3">口座引き落とし</option>
      </select>
      @error('payment_method')
          <div class="text-danger"><small>{{$message}}</small></div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="billingdate" class="col-sm-2 col-form-label form-label text-left"
      >請求締日<span class="required">※</span></label
    >
    <div class="col-sm-3">
      <select
        name="billingdate"
        id="billingdate"
        class="form-control"
        title="請求締日"
      >
        <option value="">請求締日</option>
        <option value="1">末日</option>
      </select>
      @error('billingdate')
          <div class="text-danger"><small>{{$message}}</small></div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="paymentdate" class="col-sm-2 col-form-label form-label text-left"
      >支払期日<span class="required">※</span></label>
    <div class="col-sm-3">
      <select
        name="paymentdate"
        id="paymentdate"
        class="form-control"
        title="支払期日"
      >
        <option value="">支払期日</option>
        <option value="1">末日</option>
      </select>
      @error('paymentdate')
          <div class="text-danger"><small>{{$message}}</small></div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label
      for="remark"
      class="col-sm-2 col-form-label form-label text-left"
      >請求書備考</label>
    <div class="col-sm-8">
      <textarea
        name="remark"
        id="remark"
        class="form-control"
        cols="50"
        rows="2"
        title="請求書備考"
      ></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label
      for="remark2"
      class="col-sm-2 col-form-label form-label text-left"
      >請求書備考2</label>
    <div class="col-sm-8">
      <textarea
        name="remark2"
        id="remark2"
        class="form-control"
        cols="50"
        rows="2"
        title="請求書備考"
      ></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label
      for="remark3"
      class="col-sm-2 col-form-label form-label text-left"
      >請求書備考2</label>
    <div class="col-sm-8">
      <textarea
        name="remark3"
        id="remark3"
        class="form-control"
        cols="50"
        rows="2"
        title="請求書備考"
      ></textarea>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-2 form-label text-left">
      <p>登録日</p>
    </div>
    <div class="col-sm-2 form-text-offset">
      <p>2021/11/22</p>
    </div>
    <div class="col-sm-2 form-label">
      <p>変更日</p>
    </div>
    <div class="col-sm-3 form-text-offset">
      <p>2022/04/21</p>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-2 form-label text-left">
      <p>登録メール通知</p>
    </div>
    <div class="col-sm-4 form-text-offset">
      <label>
        <input
          type="checkbox"
          name="noti"
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

        /*$("#email_send").on("change", function(){
          if($(this).is(":checked")){
            if(!confirm("Are you sure to send noti?")){
              $(this).prop("checked", true);
            }
          }
        });*/
      
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
   
        //削除ボタンを消すこと
        if ( localStorage.getItem('entry_btn') !== null ) {
            $('#delete').hide();
        }
      });
    </script>
@endpush
@endsection