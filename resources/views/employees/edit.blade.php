@extends('layouts.app', ["title" => "契約企業情報登録"])

@section('content')
<div class="container">
<form class="text-left" id="form" action="{{route("employees.store")}}" method="POST">
  @csrf
  <input type="hidden" name="company_id" id="company_id" value="999999" />
  <div class="form-signin">
    <div class="form-group row">
      <div class="col-sm-4 offset-sm-2">
        <button
          type="submit"
          id="save_btn"
          class="btn btn-lg btn-primary btn-block"
        >
          保存
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
  </div>
  <div class="form-group row">
    <div class="col-sm-3 form-label">
      <p>企業ID</p>
    </div>
    <div class="col-sm-6 form-text-offset">
      <p></p>
    </div>
    {{-- {{dd($errors)}} --}}
  </div>
  <div class="form-group row">
    <label for="name" class="col-sm-3 col-form-label form-label"
      ><span class="required">※</span>企業名</label
    >
    <div class="col-sm-6">
      <input
        type="text"
        name="name"
        id="name"
        value=""
        class="form-control"
        title="企業名"
        placeholder=""
        required
      />
    </div>
  </div>
  <div class="form-group row">
    <label for="zip_code" class="col-sm-3 col-form-label form-label"
      ><span class="required">※</span>郵便番号</label
    >
    <div class="col-sm-6">
      <div class="input-group form-number">
        <input
          type="text"
          name="zip_code"
          value=""
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
            class="btn btn-outline-secondary form-control"
            style="color: #0d6efd"
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
        </div>
      </div>
    </div>
  </div>
  <div class="form-group row">
    <label for="address1" class="col-sm-3 col-form-label form-label"
      ><span class="required">※</span>住所1</label
    >
    <div class="col-sm-6">
      <input
        type="text"
        name="address1"
        id="address1"
        value=""
        class="form-control"
        title="住所1"
        placeholder=""
        required
      />
    </div>
  </div>
  <div class="form-group row">
    <label for="address2" class="col-sm-3 col-form-label form-label"
      >住所2</label
    >
    <div class="col-sm-6">
      <input
        type="text"
        name="address2"
        id="address2"
        value=""
        class="form-control"
        title="住所2"
        placeholder=""
      />
    </div>
  </div>
  <div class="form-group row">
    <label for="telephone" class="col-sm-3 col-form-label form-label"
      ><span class="required">※</span>TEL</label
    >
    <div class="col-sm-6">
      <input
        type="text"
        name="telephone"
        id="telephone"
        value=""
        class="form-control form-number"
        title="TEL"
        placeholder="00-0000-0000"
        required
      />
    </div>
  </div>
  <div class="form-group row">
    <label for="dept1" class="col-sm-3 col-form-label form-label"
      ><span class="required">※</span>部署1</label
    >
    <div class="col-sm-6">
      <input
        type="text"
        name="dept1"
        id="dept1"
        value=""
        class="form-control"
        title="部署1"
        placeholder=""
        required
      />
    </div>
  </div>
  <div class="form-group row">
    <label for="department2" class="col-sm-3 col-form-label form-label"
      >部署2</label
    >
    <div class="col-sm-6">
      <input
        type="text"
        name="department2"
        id="department2"
        value=""
        class="form-control"
        title="部署2"
        placeholder=""
      />
    </div>
  </div>
  <div class="form-group row">
    <label for="in_charge_id" class="col-sm-3 col-form-label form-label"
      ><span class="required">※</span>担当者氏名</label
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
    <div class="col-sm-3">
      <button
        type="button"
        id="add_tantousya_btn"
        class="btn btn-primary btn-sm mr-2 px-3"
      >
        追加
      </button>
      <button
        type="button"
        id="edit_tantousya_btn"
        class="btn btn-primary btn-sm px-3"
      >
        修正
      </button>
    </div>
  </div>
  <div class="form-group row">
    <label for="payment_method" class="col-sm-3 col-form-label form-label"
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
        <option value="2">請求書発行</option>
        <option value="3">口座引き落とし</option>
      </select>
      @error('payment_method')
          <div class="text-danger"><small>{{$message}}</small></div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="deadline1" class="col-sm-3 col-form-label form-label"
      ><span class="required">※</span>請求締日</label
    >
    <div class="col-sm-3">
      <select
        name="deadline1"
        id="deadline1"
        class="form-control"
        title="請求締日"
      >
        <option value="">請求締日</option>
        <option value="1">末日</option>
      </select>
      @error('deadline1')
          <div class="text-danger"><small>{{$message}}</small></div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="deadline2" class="col-sm-3 col-form-label form-label"
      ><span class="required">※</span>支払期日</label
    >
    <div class="col-sm-3">
      <select
        name="deadline2"
        id="deadline2"
        class="form-control"
        title="支払期日"
      >
        <option value="">支払期日</option>
        <option value="1">末日</option>
      </select>
      @error('deadline1')
          <div class="text-danger"><small>{{$message}}</small></div>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label
      for="remark"
      class="col-sm-3 col-form-label form-label"
      >請求書備考</label
    >
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
    <div class="col-sm-3 form-label">
      <p>登録日</p>
    </div>
    <div class="col-sm-3 form-text-offset">
      <p>2021/11/22</p>
    </div>
    <div class="col-sm-3 form-label">
      <p>変更日</p>
    </div>
    <div class="col-sm-3 form-text-offset">
      <p>2022/04/21</p>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-3 form-label">
      <p>登録メール通知</p>
    </div>
    <div class="col-sm-5 form-text-offset">
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

@endsection