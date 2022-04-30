@extends('layouts.app')
@section('content')
    <div class="container">
      <!-- Search -->
      <form id="search_form" class="my-2 my-md-0">
        <div class="form-group">
          <div class="col-sm-4 p-0">
            <div class="input-group">
              <input
                type="text"
                class="form-control"
                placeholder="Search"
                aria-label="Search"
                aria-describedby="button-addon4"
                style="border-color: #6c757d; border-right: none"
              />
              <div class="input-group-append" id="button-addon4">
                <button
                  id="reset_btn"
                  class="btn btn-outline-secondary"
                  type="button"
                  style="border-left: none"
                >
                  ×
                </button>
                <button
                  type="button"
                  class="btn btn-outline-secondary"
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

        <div class="form-group">
          <span>契約企業：</span>
          <button type="button" class="btn btn-primary" id="entry_btn">
            登録
          </button>
          <button type="button" class="btn btn-primary" id="edit_btn">
            編集
          </button>
          <button type="button" class="btn btn-primary" id="delete_btn">
            削除
          </button>
        </div>
        <div class="form-group text-right">
          <button type="button" class="btn btn-outline-primary">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="16"
              height="16"
              fill="currentColor"
              class="bi bi-download"
              viewBox="0 0 16 16"
            >
              <path
                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"
              ></path>
              <path
                d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"
              ></path>
            </svg>
            データ出力
          </button>
        </div>

        <div class="table-responsive">
          <table class="table table-bordered table-hover list-table">
            <thead>
              <tr>
                <th></th>
                <th scope="col">企業ID</th>
                <th scope="col">契約企業名</th>
                <th scope="col">郵便番号</th>
                <th scope="col">住所1</th>
                <th scope="col">住所2</th>
                <th scope="col">TEL</th>
                <th scope="col">部署1</th>
                <th scope="col">部署2</th>
                <th scope="col">○○○</th>
                <th scope="col">○○○</th>
                <th scope="col">○○○</th>
                <th scope="col">○○○</th>
                <th scope="col">○○○</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td scope="row" class="text-center">
                  <input
                    type="radio"
                    name="sel_item"
                    id="sel_item_1"
                    class="sel_item"
                    value="1"
                  />
                </td>
                <td><a href="company.html">9999</a></td>
                <td>NEXT株式会社　関西支社</td>
                <td>542-0081</td>
                <td>大阪府大阪市中央区南船場4-2-11</td>
                <td>JPR心斎橋ビル5F</td>
                <td>06-6210-2397</td>
                <td>管理本部</td>
                <td>総務・人事部</td>
                <td>～</td>
                <td>～</td>
                <td>～</td>
                <td>～</td>
                <td>～</td>
              </tr>
              <tr>
                <td scope="row" class="text-center">
                  <input
                    type="radio"
                    name="sel_item"
                    id="sel_item_2"
                    class="sel_item"
                    value="2"
                  />
                </td>
                <td><a href="company.html">0001</a></td>
                <td>ねこすと株式会社</td>
                <td>542-0001</td>
                <td>大阪府大阪市中央区南船場1</td>
                <td>OOP心斎橋ビル</td>
                <td>06-6000-2000</td>
                <td>営業部</td>
                <td>～</td>
                <td>～</td>
                <td>～</td>
                <td>～</td>
                <td>～</td>
                <td>～</td>
              </tr>
            </tbody>
          </table>
        </div>
      </form>
    </div>
@endsection