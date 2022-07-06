@extends('layouts.app', ["title" => "契約企業情報登録・修正"])

@section('content')
<div class="container">
<form class="text-left" id="form" action="{{ route('employees.update',$employee->id) }}" method="POST">
  @csrf
  @method('PUT')
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif

  <div class="form-signin">
    <div class="form-group row">
      <div class="col-sm-3 offset-sm-2">
        <button
          type="submit"
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
        <a class="btn btn-lg btn-primary btn-block" href="{{ route('employees.index') }}" id="cancel_btn"> キャンセル</a>
    </div>
      <div class="col-sm-4 text-center">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="required">※</span>は必須項目
      </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-2 form-label text-left">
      <p>契約企業ID</p>
    </div>
    <div class="col-sm-4 form-text-offset">
      {{ $employee->id }}
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
        value="{{ $employee->name }}"
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
          value="{{ $employee->zip_code }}"
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
        value="{{ $employee->address1 }}"
        class="form-control"
        title="住所1"
        placeholder=""
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
        value="{{ $employee->address2 }}"
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
        value="{{ $employee->telephone }}"
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
        value="{{ $employee->dept1 }}"
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
    <label for="department2" class="col-sm-2 col-form-label form-label text-left"
      >部署2</label
    >
    <div class="col-sm-4">
      <input
        type="text"
        name="dept2"
        id="dept2"
        value="{{ $employee->dept2 }}"
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
    <div class="col-sm-2">
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
        編集・削除
      </button>
    </div>
  </div>

  <div class="form-group row">
    <label for="payment_method" class="col-sm-2 col-form-label form-label text-left"
      >決済方法</label>
    <div class="col-sm-2">
      <select
        name="payment_method"
        id="payment_method"
        class="form-control"
        title="決済方法"
      >
        <option value="">決済方法</option>

          <option {{ $employee->payment_method == 'credit' ? 'selected':'' }} value={{ $employee->id }}>{{ $employee->payment_method }}</option>
          <option {{ $employee->payment_method == 'debit' ? 'selected':'' }}  value={{ $employee->id }}>{{ $employee->payment_method }}</option>
          <option {{ $employee->payment_method == 'invoice' ? 'selected':'' }}  value={{ $employee->id }}>{{ $employee->payment_method }}</option>
      
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
    <div class="col-sm-2">
      <select
        name="billingdate"
        id="billingdate"
        class="form-control"
        title="請求締日"
      >
        <option value="">請求締日</option>
        <option value="1">末日</option>
        <option {{ ($employee->billingdate) == 'lastday' ? 'selected' : '' }}  value="1">{{ $employee->billingdate }}</option>
      </select>
      @error('billingdate')
          <div class="text-danger"><small>{{$message}}</small></div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="paymentdate" class="col-sm-2 col-form-label form-label text-left"
      >支払期日<span class="required">※</span></label
    >
    <div class="col-sm-2">
      <select
        name="paymentdate"
        id="paymentdate"
        class="form-control"
        title="支払期日"
      >
        <option value="">支払期日</option>
        <option value="1">末日</option>
        <option {{ ($employee->paymentdate) == 'lastday' ? 'selected' : '' }}  value="1">{{ $employee->paymentdate }}</option>
      </select>
      @error('deadline2')
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
        value=""
        class="form-control"
        cols="50"
        rows="2"
        title="請求書備考"
      >{{ $employee->remark }}</textarea>
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
        value=""
        class="form-control"
        cols="50"
        rows="2"
        title="請求書備考"
      >{{ $employee->remark2 }}</textarea>
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
        value=""
        class="form-control"
        cols="50"
        rows="2"
        title="請求書備考"
      >{{ $employee->remark3 }}</textarea>
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
          if(confirm("Are you sure to save?")){
            location.href = "{{route("employees.index")}}";
          }
        });
    });

    $(function(){
      // get the item 
      if ( localStorage.getItem('edit_btn') !== null ) {
        $('#delete_btn').hide();
      }
  });
    </script>
@endpush
@endsection