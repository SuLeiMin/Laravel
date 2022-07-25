@extends('layouts.mtcompany', ["title" => "契約企業管理"])
@section('title','契約企業管理')
@section('content')
	<div class="container">
	  <!-- Search -->
	  <form id="search_form" class="my-2 my-md-0" method="get">
      <div class="container">
      <div class="input-group">
        <span
				  class="input-group-text"
				  id="basic-addon1"
				  style="border: none; background-color: white"
				  >契約企業ID</span
				>
				<input
				  type="text"
				  id="search"
				  name = "id"
				  value=""
				  class="form-control"
				  placeholder="999999"
				  aria-label="kigyoID"
				  aria-describedby="basic-addon1"
				/>
				<span
				  class="input-group-text"
				  id="basic-addon2"
				  style="border: none; background-color: white"
				  >企業名
				</span>
				<input
				  type="text"
				  id="search"
				  name = "company_name"
				  value=""
				  class="form-control"
				  placeholder="NEXT株式会社"
				  aria-label="KigyoName"
				  aria-describedby="basic-addon2"
				/>
        <span
				  class="input-group-text"
				  id="basic-addon1"
				  style="border: none; background-color: white"
				  >郵便番号</span
				>
				<input
				  type="text"
				  id="search"
				  name = "zipcode"
				  value=""
				  class="form-control"
				  placeholder="999999"
				  aria-label="kigyoID"
				  aria-describedby="basic-addon1"
				/>
        <span
				  class="input-group-text"
				  id="basic-addon1"
				  style="border: none; background-color: white"
				  >住所</span
				>
				<input
				  type="text"
				  id="search"
				  name = "address1"
				  value=""
				  class="form-control"
				  placeholder="999999"
				  aria-label="kigyoID"
				  aria-describedby="basic-addon1"
				/>
				<span
				  class="input-group-text"
				  id="basic-addon3"
				  style="border: none; background-color: white"
				  >TEL</span
				>
				<input
				  type="text"
				  id="search"
				  name = "tel"
				  value=""
				  class="form-control"
				  placeholder="03-XXXX-XXXX"
				/>
        <button
          type="submit"
          class="btn btn-outline-secondary btn-xs"
          style="color: #0d6efd"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="15"
            height="15"
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

    <div class="container">
      <div class="form-inline">
        <div class="form-group col-4">
          <a href="{{route("mtcompanies.create")}}" class="btn btn-primary mr-1" id="entry_btn">
            登録
          </a>
          <button type="button" class="btn btn-primary mr-1" id="edit_btn">
            編集
          </button>
          <button type="button" class="btn btn-primary mr-1" id="delete_btn">
            削除
          </button>
        </div>
        <div class="form-group col-6"></div>
        <div class="form-group btn-float-right">
          <a href="downloadCompany" class="btn btn-outline-primary"> 
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
          </a>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="form-group">
        <div class="table-responsive">
          <table
            class="table table-bordered table-hover list-table"
            style="table-layout: auto; word-break: break-all; height: auto"
          >
            <thead style="background-color: #bef5d6">
              <tr>
                <th></th>
                <th scope="col">企業ID</th>
                <th scope="col">企業名</th>
                <th scope="col">郵便番号</th>
                <th scope="col">住所1</th>
                <th scope="col">住所2</th>
                <th scope="col">TEL</th>
                <th scope="col">部署1</th>
                <th scope="col">部署2</th>
                <th scope="col">契約番号</th>
                <th scope="col">所定労働時間</th>
                <th scope="col">休憩時間</th>
                <th scope="col">勤務曜日</th>
                <th scope="col">契約期間</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($items as $row)
              <tr>
                <td scope="row" class="text-center">
                  <input
                    type="radio"
                    name="sel_item"
                    id="sel_item_{{$row->id}}"
                    class="sel_item"
                    value="{{$row->id}}"
                  />
                </td>
                <td><a href="mtcompanies.create">{{ $row->id }}</a></td>
                <td>{{ $row->company_name }}</td>
                <td>{{ $row->zipcode }}</td>
                <td>{{ $row->address1 }}</td>
                <td>{{ $row->address2 }}</td>
                <td>{{ $row->tel }}</td>
                <td>{{ $row->department1 }}</td>
                <td>{{ $row->department2 }}</td>
                <td>~</td>
                <td>~</td>
                <td>~</td>
                <td>~</td>
                <td>~</td>
              </tr>
              @empty
                <tr>
                  <td>0 Data</td>
                </tr>
              @endforelse
              
              
            </tbody>
          </table>
        </div>
      </div>
    </form>
    </div>
    @push('js')
    <script>
    $(function () {
			let selno;
			// 登録
			$("#entry_btn").on("click", function () {
			location.href = "{{route("mtcompanies.create")}}";
			});
			// 編集
			$("#edit_btn").on("click", function () {
			if ((selno = chk_selno())) {
				let url = "{{route("mtcompanies.edit", "||")}}";
				url = url.replace("||", chk_selno());
				location.href = url;
			}
			});
    	// 削除処理
			$("#delete_btn").on("click", function () {
        if ((selno = chk_selno())) {
          if (!confirm("本当に削除しますか？")) {
          // キャンセル
          return false;
          } else {
            console.log(selno);
          let url = "{{route("mtcompanies.can-delete", "||")}}";
          url = url.replace("||", chk_selno());
          $.ajax({
            url,
            success: function(res){
            if(res){
              let url = "{{route("mtcompanies.destroy", "||")}}";
              url = url.replace("||", chk_selno());
              $.ajax({
              url,
              data: {
                "_token": "{{csrf_token()}}",
                "_method": "DELETE"
                //ajax and laravel 
              },
              method: "POST",
              success: function(res){
                alert(selno + "が削除されました");
                location.reload();
                location.href = "./top.html";
              }
              })
            }else{
              alert("就業中の従業員がいるため削除できません");
              return false;
            }
            }
          })
          }
        }
        });

    });

    // レコード選択チェック
		function chk_selno() {
			let selno = $(".sel_item:checked").val();
			if (selno == "0" || selno == undefined) {
			alert("有効なレコードが選択されていません");
			return false;
			}
			return selno;
		}
  </script>
    @endpush
@endsection