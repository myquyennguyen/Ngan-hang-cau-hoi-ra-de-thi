<html>
	<header>
		<title>Cập nhật cán bộ</title>
	</header>
	<body>
		<div class="menund">
			<label style="font-size: 150%; font-weight: bold; color: rgb(223,43,140); margin-left: 1%;">Cập nhật cán bộ</label>
			@include('error')
				<div class="wrap">
					<div class="over" style="height: 75%;">		
						<table id="example" class="table table-hover table-striped table-bordered" border="1" style="width:100%;" align="center">
							<thead>
						        <tr>
								    <th style="width: 5%">STT</th>
						            <th style="width: 10%">Mã</th>
						            <th style="width: 20%">Họ tên</th>
						            <th style="width: 10%">Ngày sinh</th>
							        <th style="width: 5%">Giới tính</th>
						            <th style="width: 10%">Học vị</th>
						            <th style="width: 10%">Chức vụ</th>
						            <th style="width: 20%">Bộ môn</th>
						            <th style="width: 5%">Sửa</th>
						        </tr>
						    </thead>
						    <tbody>
						   		<?php $i=1; ?>
						        @foreach($canbo as $cb)
							        <tr>
							        	<td><?php echo $i++; ?></td>
								        <td id="mac_{{$i-1}}" data-id="{{$cb->MaCanBo}}">{{$cb->MaCanBo}}</td>
							            <td id="ht_{{$i-1}}" data-id="{{$cb->HoTen}}">{{$cb->HoTen}}</td>
							            <td id="ns_{{$i-1}}" data-id="{{$cb->NgaySinh}}">{{$cb->NgaySinh}}</td>
								        <td id="gt_{{$i-1}}" data-id="{{$cb->GioiTinh}}">{{$cb->GioiTinh}}</td>
								        <td id="hv_{{$i-1}}" data-id="{{$cb->HocVi}}">{{$cb->HocVi}}</td>
								        <td id="cv_{{$i-1}}" data-id="{{$cb->MaChucVu}}">{{$cb->TenChucVu}}</td>
							            <td id ="bm_{{$i-1}}" data-id="{{$cb->MaBoMon}}">{{$cb->TenBoMon}}</td>
							            <td>
                                            <button id="sua" data-id="{{$i-1}}" class="btn btn-primary" ><i class="fa fa-edit" style="color: white;"></i></button>
                                        </td>
							        </tr>
						        @endforeach
							</tbody>
						</table>
					</div>	
				</div>
				<div class="button">
					<button class="btn btn-success insertbtn" name="themcb" type="button">Thêm cán bộ</button>
				</div>
		</div>

<!-- modal cập nhật cán bộ -->
		<div class="modal" id="updatecanbo" role="dialog">
		  	<div class="modal-dialog" role="document">
		   		<div class="modal-content">
		       		<div class="modal-header">
		        		<h4 class="modal-title">Cập nhật thông tin cán bộ</h4>
		      		</div>
		      		<form  id="editform" action="{{URL::to('update_canbo')}}" method="POST">
		      		@csrf
		      			<div class="modal-body">
		      				<table style="width: 100%">
		      					<tr>
			                		<td>Họ tên:</td>
			                		<td><input class="form-control" type="text" id="hoten_edit" name="hoten_edit" required></td>
			                	</tr>
			                	<tr>
			                		<td>Ngày sinh:</td>
			                		<td><input class="form-control" type="text" id="ngaysinh_edit" name="ngaysinh_edit" placeholder="yyyy-mm-dd" required pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" title="Nhập đúng định dạng yyyy-mm-dd"> </td>
			                	</tr>
			                	<tr>
			                		<td>Giới tính:</td>
			                		<td><input type="radio" id="Nam" name="gioitinh_edit" value="Nam">Nam
			                		<input type="radio" id="Nữ" name="gioitinh_edit" value="Nữ">Nữ</td>
			                	</tr>
			                	<tr>
			                		<td>Học vị:</td>
			                		<td><input class="form-control" type="text" id="hocvi_edit" name="hocvi_edit" required></td>
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
			      				<tr>
			      					<td>Chức vụ: </td>
			       					<td>
			       						<select name ="chucvu_edit" id="chucvu_edit" class="form-control">
											@foreach($chucvu as $cv)
												<option value="{{$cv->MaChucVu}}">{{$cv->TenChucVu}}</option>
											@endforeach
										</select>
			    	   				</td>
			       				<tr>
		       				</table> 			
		      			</div>
		      			<div class="modal-footer">
		      				<input hidden="true" type="text" name="macb" id="macb">	
		   					<button  type="submit" class="btn btn-primary">Cập nhật</button>
		       				<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
		      			</div>
		    	  	</form>
		    	</div>
		  	</div>
		</div>

<!-- modal thêm cán bộ -->
		 <div class="modal fade" id="insertcanbo" role="dialog">
		    <div class="modal-dialog">
		      <div class="modal-content">
					<label class="tdtable">Thêm cán  bộ</label><br>
					<form action="insert_canbo" method="post" class="form11">
					@csrf
						<div class="modal-body">
		      				<table style="width: 100%">
		      					<tr>
			                		<td>Mã cán bộ:</td>
			                		<td><input class="form-control" type="text" id="macb_insert" name="macb_insert" required></td>
			                	</tr>
		      					<tr>
			                		<td>Họ tên:</td>
			                		<td><input class="form-control" type="text" id="hoten_insert" name="hoten_insert" required></td>
			                	</tr>
			                	<tr>
			                		<td>Ngày sinh:</td>
			                		<td><input class="form-control" type="text" id="ngaysinh_insert" name="ngaysinh_insert" placeholder="yyyy-mm-dd" required pattern="[0-9]{4}-[0-2]{2}-[0-9]{2}" title="Nhập đúng định dạng yyyy-mm-dd"> </td>
			                	</tr>
			                	<tr>
			                		<td>Giới tính:</td>
			                		<td><input type="radio" id="Nam" name="gioitinh_insert" value="Nam" required>Nam
			                		<input type="radio" id="Nữ" name="gioitinh_insert" value="Nữ">Nữ</td>
			                	</tr>
			                	<tr>
			                		<td>Học vị:</td>
			                		<td><input class="form-control" type="text" id="hocvi_insert" name="hocvi_insert" required></td>
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
			      				<tr>
			      					<td>Chức vụ: </td>
			       					<td>
			       						<select name ="chucvu_insert" id="chucvu_insert" class="form-control">
											@foreach($chucvu as $cv)
												<option value="{{$cv->MaChucVu}}">{{$cv->TenChucVu}}</option>
											@endforeach
										</select>
			    	   				</td>
			       				<tr>
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


		 <script type="text/javascript">
            $(document).ready(function() 
            {
			    $('#example').DataTable( 
			    {
			        "paging":   false,
			        "info":     false
			    });
			});

			$('.insertbtn').on('click',function()
			{
		  		$.modal = $('#insertcanbo');
		   		$.modal.find('form')[0].reset();
		  		$('#insertcanbo').modal('show');
		  	});

			$(document).on('click','#sua', function()
			{
				$ma = $(this).data('id');
				$ht = $('#ht_'+$ma).data('id');
				$ns = $('#ns_'+$ma).data('id');
				$gt = $('#gt_'+$ma).data('id');
				$hv = $('#hv_'+$ma).data('id');
				$bm = $('#bm_'+$ma).data('id');
				$cv = $('#cv_'+$ma).data('id');
				$macb_edit = $('#mac_'+$ma).data('id');

				$('#macb').val($macb_edit);
				$('#bomon_edit').val($bm);
				$('#hoten_edit').val($ht);
				$('#ngaysinh_edit').val($ns);
				$('#'+$gt).attr('checked',true);
				$('#hocvi_edit').val($hv);
				$('#chucvu_edit').val($cv);
				$('#updatecanbo').modal('show');  
			});
        </script>
	</body>
</html>