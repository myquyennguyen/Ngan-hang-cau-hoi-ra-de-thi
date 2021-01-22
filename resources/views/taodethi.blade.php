<html>
	<header>
		<title>Tạo đề thi</title>
	</header>
	<body>
		<div class="menund">
			<div style="width: 100%">
			<label style="font-size: 150%; font-weight: bold; color: rgb(223,43,140); margin-left: 1%;">Tạo đề thi</label>
			</div>
			<div class="" style="width: 100%; height: 90%; float: left;">
				@include('error')

				<div class="loginbackground3" style="margin: -3% auto;">
					<div class="loginbackground2">
					@if((\Session::get('phanquyen') == '03'))
						<form action="{{URL::to('xuly_taodethi')}}" method="POST" class="form11">
					@elseif((\Session::get('phanquyen') == '02'))
						<form action="{{URL::to('xuly_taodethitbm')}}" method="POST" class="form11">
					@endif
						@csrf
							<table style="width:100%">	
								<tr>
									<th>Môn học</th>
									<td>
										<select class="form-control" id="slmonhoc" name="slmonhoc" >
											@foreach($monhoc as $row)
												<option value="{{$row->MaMonHoc}}">{{$row->TenMonHoc}}</option>
											@endforeach  
										</select>
									</td>
								</tr>
								<tr>
									<th>Tiêu đề đề thi:</th>
									<td><input class="form-control" type="text" name="tieude" required></td>
								</tr>
								<tr>
									<th>Thời gian làm bài:</th>
									<td><input class="form-control" type="number" name="thoigian" required></td>
								</tr>
								<tr>
									<th>Số câu nhận biết:</th>
									<td><input class="form-control" type="number" name="nhanbiet" required></td>
								</tr>
								<tr>
									<th>Số câu thông hiểu:</th>
									<td><input class="form-control" type="number" name="thonghieu" required></td>
								</tr>
								<tr>
									<th>Số câu vận dụng:</th>
									<td><input class="form-control" type="number" name="vandung" required></td>
								</tr>
								<tr>
									<th>Số câu vận dụng cao:</th>
									<td><input class="form-control" type="number" name="vandungcao" required></td>
								</tr>
							</table>
							<div class="button">
								<button class="btn btn-primary" type="submit">Tạo đề</button>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div> 
		<script type="text/javascript">
			$(document).ready(function() {
	            $("#slmonhoc").select2({
	                    placeholder: "Chọn môn học ...",
	                    allowClear: true
	             });
	        });
		</script>
	</body>
</html>