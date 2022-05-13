@extends('layouts.app', ["title" => "契約企業一覧"])
	
@section('content')
	<div class="container">
	  <!-- Search -->
	  <form id="search_form" class="my-2 my-md-0">
		<div class="form-group">
		  <div class="col-sm-4 p-0">
			<div class="input-group">
			  <input
				type="text"
				name="search"
				value="{{request()->get("search")}}"
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
				  type="submit"
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
		  <a href="{{route("employees.create")}}" class="btn btn-primary" id="entry_btn">
			登録
		  </a>
		  <button type="button" disabled class="btn btn-primary" id="edit_btn">
			編集
		  </button>
		  <button type="button" disabled class="btn btn-primary" id="delete_btn">
			削除
		  </button>
		</div>
		<div class="form-group text-right">
		 
			<a href="download" class="btn btn-outline-primary"> 
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
				@forelse($items as $item)
				<tr>
					<td scope="row" class="text-center">
					  <input
						type="radio"
						name="sel_item"
						id="sel_item_{{$item->id}}"
						class="sel_item"
						value="{{$item->id}}"
					  />
					</td>
					<td><a href="company.html">{{$item->id}}</a></td>
					<td>{{$item->name}}</td>
					<td>{{$item->zip_code}}</td>
					<td>{{$item->address1}}</td>
					<td>{{$item->address2}}</td>
					<td>{{$item->telephone}}</td>
					<td>{{$item->dept1}}</td>
					<td>{{$item->dept2}}</td>
					<td>～</td>
					<td>～</td>
					<td>～</td>
					<td>～</td>
					<td>～</td>
				  </tr>
				@empty
				<tr>
					<td colspan="14" align="center">No Data</td>
				  </tr>
				@endforelse
			</tbody>
		  </table>
		</div>
	  </form>
	</div>
  
	@push("js")
		<script>
		$(function () {
			let selno;
			// 登録
			$("#entry_btn").on("click", function () {
			location.href = "{{route("employees.create")}}";
			});
			// 編集
			$("#edit_btn").on("click", function () {
			if ((selno = chk_selno())) {
				let url = "{{route("employees.edit", "||")}}";
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
				let url = "{{route("employees.can-delete", "||")}}";
				url = url.replace("||", chk_selno());
				$.ajax({
					url,
					success: function(res){
					if(res){
						let url = "{{route("employees.destroy", "||")}}";
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
			// 検索リセット
			$("#reset_btn").on("click", function () {
			$("#search_form")[0].reset();
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
		$(".sel_item").on("change", function(){
			$("#edit_btn").attr("disabled", false);
			$("#delete_btn").attr("disabled", false);
		})
		</script>
	@endpush
@endsection