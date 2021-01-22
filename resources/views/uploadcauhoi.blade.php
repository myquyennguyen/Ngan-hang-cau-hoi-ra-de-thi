<html>
	<header>
		<title>Upload câu hỏi</title>
	</header>
	<body>
							
		<div class="menund">
			<div style="width: 100%">
				<label style="font-size: 150%; font-weight: bold; color: rgb(223,43,140); margin-left: 1%; margin-bottom: -1%">Upload câu hỏi</label>
			</div>
			<div id="upload" class="table1" style="width: 50%; height: 90%;">
				<label style="font-size: 130%; font-weight: bold; color: blue;margin-top: 1%; margin-left: 0%;">Upload file</label>
				@include('error')
		            <form action="{{URL::to('uploadfile')}}" method="POST" enctype="multipart/form-data">	
					    @csrf
						<table>
							<tr>
								<td>Môn học</td>
								<td>
									<select class="form-control" id="slmonhoc" name="slmonhoc" >
								    @foreach($monhoc as $row)
										<option value="{{$row->MaMonHoc}}">{{$row->TenMonHoc}}</option>
									@endforeach  
									</select>	
								</td>						
							</tr>
							<tr>
								<td>Mức độ</td>
								<td>
									<select class="form-control" id="slmd" name="slmd">
									@foreach($mucdo as $row)
										<option value="{{$row->MaMucDo}}">{{$row->MucDo}}</option>
									@endforeach  
									</select>
								</td>
							</tr>
							<tr>
								<td>Chọn file</td>
								<td><input class="form-control" type="file" name="fileupload" required></td>
							</tr>
							<tr>
								<td colspan="2" style="text-align: center;"><button type="submit" class="btn btn-success">Upload</button></td>
							</tr>
						</table>	                
					</form>
			</div>
			<div class="table2" style="width: 49%; height: 90%; ">
				<label style="font-size: 130%; font-weight: bold; color: blue;margin-top: 1%; margin-left: 0%;">Upload từng câu</label>
				<form action="{{URL::to('uptungcau')}}" method="POST" enctype="multipart/form-data">	
				@csrf
				<div style="overflow: auto; height: 90%;">
					<table style="width: 100%">
						<div>
							<label style ="width: 30%">&ensp;Môn học</label>
							<select class="form-control" id="slmonhoc" name="slmonhoc" >
						    @foreach($monhoc as $row)
								<option value="{{$row->MaMonHoc}}">{{$row->TenMonHoc}}</option>
							@endforeach  
							</select>							
						</div>
						<div>
							<label style ="width: 30%">&ensp;Mức độ</label>
							<select class="form-control" id="slmd" name="slmd">
							@foreach($mucdo as $row)
								<option value="{{$row->MaMucDo}}">{{$row->MucDo}}</option>
							@endforeach  
							</select>
						</div>
						<div>
							<label style ="width: 30%">&ensp; Câu hỏi</label>
							<textarea class="form-control alert-primary" id="ndcauhoi" name="ndcauhoi" style="border: 2px solid blue;" required></textarea>
							<input class="form-control" type="file" name="img_cauhoi[]" multiple>
						</div>
						<div>
							<label style ="width: 30%">&ensp; Đáp án</label>
							<div id="dapan">
								<textarea class="form-control alert-success"  id="nddapan_true" name="nddapan_true" style="border: 1px solid green;" required></textarea>
								<input class="form-control" type="file" name="img_dapan_true[]" multiple>
								<br><textarea class="form-control alert-danger"  id="nddapan_f1" file="" name="nddapan_f1" style="border: 1px solid red;" required></textarea>
								<input class="form-control" type="file" name="img_dapan_f1[]" multiple>
							</div>
							<input class="form-control btn-primary" id="themda" type="button" value="Thêm đáp án">
						</div>
						<div class="button">
							<button type="submit" id="uploadbtn" class="btn btn-success">Upload</button>
						</div>
						<input type="text" id="sl_da" name="sl_da" value="1" hidden>
					</table>
				</div>	                
				</form>	
			</div>
		</div>
		<script type="text/javascript">
			$(document).ready(function()
			{
				$('#themda').on('click',function()
				{
					var slda = $('#sl_da').val();
					slda++;
					$('#sl_da').val(slda);
					$('#dapan').append('<br><textarea class=" alert-danger form-control"  id="nddapan_f'+slda+'" name="nddapan_f'+slda+'" style="border: 1px solid red;" required></textarea><input class="form-control" type="file" name="img_dapan_f'+slda+'[]" multiple>');
				});
			});
   		 </script>
	</body>
</html>