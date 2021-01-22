<html>
	<head>
		<title>Cập nhật tài khoản</title>
	</head>
	<body>
		<div class="menund">
			<label style="font-size: 150%; font-weight: bold; color: rgb(223,43,140); margin-left: 1%;">Cập nhật tài khoản</label>
			@include('error')
				<div class="wrap">
					<div class="over" style="height: 75%;">										
						<table id="example" class="table table-hover table-striped table-bordered" border="1" style="width:100%" align="center">
							<thead>
						        <tr>
						            <th style="width: 5%">STT</th>
						            <th style="width: 20%">Tên đăng nhập</th>
						            <th style="width: 15%">Mã cán bộ</th>
						            <th style="width: 40%">Họ tên cán bộ</th>
						            <th style="width: 10%">Phân quyền</th>
						            <th style="width: 5%">Sửa</th>
						            <th style="width: 5%">Xóa</th>
						        </tr>
						    </thead>
						    <tbody id="output" name="output">
					   		<?php $i=1; ?>
					        @foreach($accinf as $account)
						        <tr>			        	
						        	<td><?php echo $i++; ?></td>
						            <td id="name_{{$i-1}}" data-id="{{$account->name}}">{{$account->name}}</td>
							        <td id="ma_{{$i-1}}" data-id="{{$account->MaCanBo}}">{{$account->MaCanBo}}</td>
							        <td>{{$account->HoTen}}</td>
							        <td id="pq_{{$i-1}}" data-id="{{$account->MaPhanQuyen}}">{{$account->TenPhanQuyen}}</td>
							        <td><button id="sua" data-id="{{$i-1}}" class="btn btn-primary myBtn" ><i class="fa fa-edit" style="color: white;"></i></button></td>
								    <td><button  id="xoa" data-id="{{$account->MaCanBo}}" class="btn btn-danger"><i class="fa fa-trash" style="color: white;"></i></button></td>		        	
								</tr>
						    @endforeach
						    @foreach($sinhvien as $svien)
						        <tr>			        	
						        	<td><?php echo $i++; ?></td>
						            <td id="name_{{$i-1}}" data-id="{{$svien->name}}">{{$svien->name}}</td>
							        <td id="ma_{{$i-1}}" data-id="{{$svien->MaSinhVien}}">{{$svien->MaSinhVien}}</td>
							        <td>{{$svien->TenSinhVien}}</td>
							        <td >Sinh viên</td>
							        <td><button id="suasv" data-id="{{$i-1}}" class="btn btn-primary myBtn" ><i class="fa fa-edit" style="color: white;"></i></button></td>
								    <td><button  id="xoasv" data-id="{{$svien->MaSinhVien}}" class="btn btn-danger"><i class="fa fa-trash" style="color: white;"></i></button></td>		        	
								</tr>
						    @endforeach
						    </tbody>
						</table>
					</div>
					<div class="button">
			   	        <button class="btn btn-success insertbtn" >Thêm tài khoản cán bộ</button>
			   	        <button class="btn btn-success insertbtnsv" >Thêm tài khoản sinh viên</button>
				    </div>											
				</div>
		</div>

<!-- modal Cập nhật tài khoản -->
			<div class="modal" id="updatetaikhoan" role="dialog">
			  	<div class="modal-dialog" role="document">
			   		<div class="modal-content">
			       		<div class="modal-header">
			        		<h5 class="modal-title">Cập nhật tài khoản cán bộ</h5>
			      		</div>
			      		<form action="{{URL::to('update_taikhoan')}}" method="POST">
			      		@csrf
				      		<div class="modal-body">
				      			<table style="width: 100%">
				      				<tr>
				      					<th>Tên đăng nhập: </th>
					       				<td>
					       					<input class="form-control" type="text" name="name" id="name" required> 
					       				</td>      			
					      			</tr>
					      			<tr>
					      				<th>Mật khẩu: </th>
					       				<td>
					       					<input class="form-control" type="text" name="pass" id="pass" required>
					       				</td>
					       			</tr>
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


<!-- modal Cập nhật tài khoản sinh viên-->
			<div class="modal" id="updatetaikhoansv" role="dialog">
			  	<div class="modal-dialog" role="document">
			   		<div class="modal-content">
			       		<div class="modal-header">
			        		<h5 class="modal-title">Cập nhật tài khoản sinh viên</h5>
			      		</div>
			      		<form action="{{URL::to('update_taikhoansv')}}" method="POST">
			      		@csrf
				      		<div class="modal-body">
				      			<table style="width: 100%">
				      				<tr>
				      					<th>Tên đăng nhập: </th>
					       				<td>
					       					<input class="form-control" type="text" name="namesv" id="namesv" required> 
					       				</td>      			
					      			</tr>
					      			<tr>
					      				<th>Mật khẩu: </th>
					       				<td>
					       					<input class="form-control" type="text" name="pass" id="pass" required>
					       				</td>
					       			</tr>
				       			</table> 			
				      		</div>
				      		<div class="modal-footer">
				      			<input hidden="true" type="text" name="masv" id="masv">	
				   				<button  type="submit" class="btn btn-primary">Cập nhật</button>
				       			<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
				      		</div>
			      	    </form>
			    	</div>
			  	</div>
			</div>


<!-- modal thêm tài khoản -->
			 <div class="modal fade" id="inserttaikhoan" role="dialog">
			    <div class="modal-dialog">
			        <div class="modal-content">
						<label class="tdtable">Thêm tài khoản cán bộ</label><br>
						<form action="insert_taikhoan" method="post" class="form11">
						@csrf
							<div class="form-group">
								<label><b>Tên đăng nhập:</b></label>
								<input class="form-control" type="text" name="username" required>
							</div>
							<div class="form-group">
								<label><b>Mã số cán bộ:</b></label>
								<select style="width: 100%" name ="slcb" class="form-control" id="states">
								@foreach($user as $acc)
									<option value="{{$acc->MaCanBo}}">{{$acc->MaCanBo}}</option>
								@endforeach
								</select>									
							</div>
							<div class="form-group">
								<label><b>Mật khẩu:</b></label>
								<input class="form-control" type="password" name="pass" id="pass" required>
							</div>
							<div id="message"></div>
							<div class="modal-footer">   			
								<button  type="submit" class="btn btn-primary">Thêm</button> 							       			<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
							</div>
						</form>							
		      		</div>
		  		</div>
			</div>

<!-- modal thêm tài khoản sinh viên -->
			 <div class="modal fade" id="inserttaikhoansv" role="dialog">
			    <div class="modal-dialog">
			        <div class="modal-content">
						<label class="tdtable">Thêm tài khoản sinh viên</label><br>
						<form action="insert_taikhoansv" method="post" class="form11">
						@csrf
							<div class="form-group">
								<label><b>Tên đăng nhập:</b></label>
								<input class="form-control" type="text" name="usernamesv" required>
							</div>
							<div class="form-group">
								<label><b>Mã số sinh viên:</b></label>
								<select name ="slsv" style="width: 100%" id ="statesv" class="form-control">
								@foreach($sv as $acc)
									<option value="{{$acc->MaSinhVien}}">{{$acc->MaSinhVien}}</option>
								@endforeach
								</select>									
							</div>
							<div class="form-group">
								<label><b>Mật khẩu:</b></label>
								<input class="form-control" type="password" name="passsv" id="passsv" required>
							</div>
							<div id="message"></div>
							<div class="modal-footer">   			
								<button  type="submit" class="btn btn-primary">Thêm</button> 							       			<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
							</div>
						</form>							
		      		</div>
		  		</div>
			</div>
        
<!-- modal xóa tài khoản -->
			<div class="modal fade" id="deletetaikhoan" role="dialog">
    			<div class="modal-dialog">
    				<div class="modal-content">
        				<h4 class="modal-title">Xóa tài khoản cán bộ</h4>
						<form id="deleteformID" method="post" action="delete_taikhoan"> 	
        				@csrf
        					<div class="modal-body">
     							<label>Bạn có chắc muốn xóa tài khoản không?</label>
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

<!-- modal xóa tài khoản sinh viên-->
			<div class="modal fade" id="deletetaikhoansv" role="dialog">
    			<div class="modal-dialog">
    				<div class="modal-content">
        				<h4 class="modal-title">Xóa tài khoản sinh viên</h4>
						<form id="deleteformID" method="post" action="delete_taikhoansv"> 	
        				@csrf
        					<div class="modal-body">
     							<label>Bạn có chắc muốn xóa tài khoản không?</label>
     							<input type="text" name = "sttsv" id="sttsv" hidden>
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
            // $('#search').on('keyup',function(){
            //     $value = $(this).val();
            //     $.ajax({
            //         type: 'get',
            //         url: '{{ URL::to('searchtk') }}',
            //         data: {
            //             'search': $value
            //         },
            //         success:function(data){
            //             $('#output').html(data);
            //         }
            //     });
            // })
            //$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
   
           

    //        $('#repass').on('keyup', function () 
				// {
			 //  		if ($('#pass').val() == $('#repass').val()) 
			 //  		{
			 //    		$('#message').html('Mật khẩu trùng khớp!').css('color', 'green');
			 //   		 	document.getElementById("btn-submit").disabled = false;
				// 	} 
				// 	else 
			 //    		$('#message').html('Mật khẩu chưa trùng khớp!').css('color', 'red');
				// });
//data table
			$(document).ready(function() 
			{
			    $('#example').DataTable( 
			    {
			        "paging":   false,
			        "info":     false,
			         
			    });
			});
     
// cập nhật thông tin tài khoản
            $(document).on('click','#sua',function()
            { 
	            $ma = $(this).data('id');
				$macb = $('#ma_'+$ma).data('id');
				$tendn = $('#name_'+$ma).data('id');

				$('#macb').val($macb);
				$('#name').val($tendn);
				$('#updatetaikhoan').modal('show'); 
			});
// cập nhật thông tin tài khoản sinh viên
            $(document).on('click','#suasv',function()
            { 
	            $ma = $(this).data('id');
				$masv = $('#ma_'+$ma).data('id');
				$tendn = $('#name_'+$ma).data('id');

				$('#masv').val($masv);
				$('#namesv').val($tendn);
				$('#updatetaikhoansv').modal('show'); 
			});

// thêm tài khoản
			$('.insertbtn').on('click',function()
			{
		  		$.modal = $('#inserttaikhoan');
		   		$.modal.find('form')[0].reset();
		  		$('#inserttaikhoan').modal('show');
		  	});

// thêm tài khoản sinh viên
			$('.insertbtnsv').on('click',function()
			{
		  		$.modal = $('#inserttaikhoansv');
		   		$.modal.find('form')[0].reset();
		  		$('#inserttaikhoansv').modal('show');
		  	});

//xóa tài khoản
			$(document).on('click','#xoa',function()
			{
				$id = $(this).data('id');
				$('#stt').val($id);
				$('#deletetaikhoan').modal('show');
			});

//xóa tài khoản sinh viên
			$(document).on('click','#xoasv',function()
			{
				$id = $(this).data('id');
				$('#sttsv').val($id);
				$('#deletetaikhoansv').modal('show');
			});

			$(document).ready(function() {
	            $("#states").select2({
	                    placeholder: "Tất cả",
	                    allowClear: true
	             });
	            $("#statesv").select2({
	                    placeholder: "Tất cả",
	                    allowClear: true
	             });
	        });
        </script>
	</body>
</html>
