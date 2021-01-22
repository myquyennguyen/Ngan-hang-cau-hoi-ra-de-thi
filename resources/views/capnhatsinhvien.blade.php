<html>
	<header>
		<title>Cập nhật sinh viên</title>
	</header>
	<body>
		<div class="menund">
			<label style="font-size: 150%; font-weight: bold; color: rgb(223,43,140); margin-left: 1%;">Cập nhật sinh viên</label>
			@include('error')
				<div class="wrap">
					<div class="over" style="height: 75%;">		
						<table id="example" class="table table-hover table-striped table-bordered" border="1" style="width:100%;" align="center">
							<thead>
						        <tr>
								    <th style="width: 5%">STT</td>
						            <th style="width: 10%">Mã</td>
						            <th style="width: 20%">Họ tên</td>
							        <th style="width: 5%">Giới tính</td>
						            <th style="width: 20%">Bộ môn</td>
						            <th style="width: 5%">Sửa</td>
						            <th style="width: 5%">Xóa</td>
						        </tr>
						    </thead>
						    <tbody>
						   		<?php $i=1; ?>
						        @foreach($sinhvien as $sv)
							        <tr>
							        	<td><?php echo $i++; ?></td>
								        <td id="masv_{{$i-1}}" data-id="{{$sv->MaSinhVien}}">{{$sv->MaSinhVien}}</td>
							            <td id="ht_{{$i-1}}" data-id="{{$sv->TenSinhVien}}">{{$sv->TenSinhVien}}</td>
								        <td id="gt_{{$i-1}}" data-id="{{$sv->GioiTinh}}">{{$sv->GioiTinh}}</td>
							            <td id ="bm_{{$i-1}}" data-id="{{$sv->MaBoMon}}">{{$sv->TenBoMon}}</td>
							            <td>
                                            <button id="sua" data-id="{{$i-1}}" class="btn btn-primary" ><i class="fa fa-edit" style="color: white;"></i></button>
                                        </td>
                                        <td>
                                            <button id="xoa" data-id="{{$sv->MaSinhVien}}" class="btn btn-danger"><i class="fa fa-trash" style="color: white;"></i></button>
                                        </td>
							        </tr>
						        @endforeach
							</tbody>
						</table>
					</div>	
				</div>
				<div class="button">
					<button class="btn btn-success insertbtn" name="themcb" type="button">Thêm sinh viên</button>
				</div>
		</div>

<!-- modal cập nhật sinh viên -->
		<div class="modal" id="updatesinhvien" role="dialog">
		  	<div class="modal-dialog" role="document">
		   		<div class="modal-content">
		       		<div class="modal-header">
		        		<h5 class="modal-title">Cập nhật thông tin sinh viên</h5>
		      		</div>
		      		<form  id="editform" action="{{URL::to('update_sinhvien')}}" method="POST">
		      		@csrf
		      			<div class="modal-body">
		      				<table style="width: 100%">
		      					<tr>
			                		<td>Họ tên:</td>
			                		<td><input class="form-control" type="text" id="hoten_edit" name="hoten_edit" required></td>
			                	</tr>
			                	<tr>
			                		<td>Giới tính:</td>
			                		<td><input type="radio" id="Nam" name="gioitinh_edit" value="Nam">Nam
			                		<input type="radio" id="Nữ" name="gioitinh_edit" value="Nữ">Nữ</td>
			                	</tr>
						       	<tr>
					      			<td>Bộ môn: </td>
				     				<td>
			    	   					<select name ="bomon_edit" id="bomon_edit" class="form-control">
											@foreach($bomon as $bm)
												<option value="{{$bm->MaBoMon}}">{{$bm->TenBoMon}}</option>
											@endforeach
										</select>
				       				</td>
			      				</tr>
		       				</table> 			
		      			</div>
		      			<div class="modal-footer">
		      				<input  type="text" name="macb" id="macb">	
		   					<button  type="submit" class="btn btn-primary">Cập nhật</button>
		       				<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
		      			</div>
		    	  	</form>
		    	</div>
		  	</div>
		</div>

<!-- modal thêm sinh viên -->
		 <div class="modal fade" id="insertsinhvien" role="dialog">
		    <div class="modal-dialog">
		      <div class="modal-content">
					<label class="tdtable">Thêm sinh viên</label><br>
					<form action="insert_sinhvien" method="post" class="form11">
					@csrf
						<div class="modal-body">
		      				<table style="width: 100%">
		      					<tr>
			                		<td>Mã sinh viên:</td>
			                		<td><input class="form-control" type="text" id="macb_insert" name="macb_insert" required></td>
			                	</tr>
		      					<tr>
			                		<td>Họ tên:</td>
			                		<td><input class="form-control" type="text" id="hoten_insert" name="hoten_insert" required></td>
			                	</tr>
			                	<tr>
			                		<td>Giới tính:</td>
			                		<td><input type="radio" id="Nam" name="gioitinh_insert" value="Nam" required>Nam
			                		<input type="radio" id="Nữ" name="gioitinh_insert" value="Nữ">Nữ</td>
			                	</tr>
						       	<tr>
					      			<td>Bộ môn: </td>
				     				<td>
			    	   					<select name ="bomon_insert" id="bomon_insert" class="form-control">
											@foreach($bomon as $bm)
												<option value="{{$bm->MaBoMon}}">{{$bm->TenBoMon}}</option>
											@endforeach
										</select>
				       				</td>
			      				</tr>
		       				</table> 			
		      			</div>
						<div class="modal-footer">    			
							<button  type="submit" class="btn btn-primary">Thêm</button>
			       			<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
			    		</div>
					</form>											
		        </div>
		    </div>
		</div>

<!-- Modal xóa sinh viên -->
		<div class="modal fade" id="deletesinhvien" role="dialog">
    			<div class="modal-dialog">
    				<div class="modal-content">
        				<h4 class="modal-title">Xóa sinh viên</h4>
						<form id="deleteformID" method="post" action="delete_sinhvien"> 	
        				@csrf
        					<div class="modal-body">
     							<label>Bạn có chắc muốn xóa sinh viên không?</label>
     							<input type="text" name = "stt" id="stt" hidden>
       						</div>
     						<div class="modal-footer">
					        	<button  type="submit" class="btn btn-danger">Xóa</button>
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
					        </div>
					    </form>
     				</div>
 				</div>
			</div>


		 <script type="text/javascript">

// data table
            $(document).ready(function() 
            {
			    $('#example').DataTable( 
			    {
			        "paging":   false,
			        "info":     false
			    });
			});

// thêm sinh viên
			$('.insertbtn').on('click',function()
			{
		  		$.modal = $('#insertsinhvien');
		   		$.modal.find('form')[0].reset();
		  		$('#insertsinhvien').modal('show');
		  	});

// cập nhật thông tin sinh viên
			$(document).on('click','#sua', function()
			{
				$ma = $(this).data('id');
				$ht = $('#ht_'+$ma).data('id');
				$gt = $('#gt_'+$ma).data('id');
				$bm = $('#bm_'+$ma).data('id');
				$masv_edit = $('#masv_'+$ma).data('id');

				$('#macb').val($masv_edit);
				$('#bomon_edit').val($bm);
				$('#hoten_edit').val($ht);
				$('#'+$gt).attr('checked',true);
				$('#updatesinhvien').modal('show');  
			});

//xóa tài khoản
			$(document).on('click','#xoa',function()
			{
				$id = $(this).data('id');
				$('#stt').val($id);
				$('#deletesinhvien').modal('show');
			});
        </script>
	</body>
</html>