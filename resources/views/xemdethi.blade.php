<html>
	<head>
		<title>Xem đề thi</title>
		<style type="text/css">
			$('#xemkqthi').dataTable();
			table { width:250px;table-layout:fixed; }
			table tr { height:1em;  }
			td { overflow:hidden;white-space:nowrap;  }
		</style>
	</head>
	<body>
		<div>
			<div>
				<label style="font-size: 150%; font-weight: bold; color: rgb(223,43,140); margin-left: 1%;">Xem đề thi</label>
				<label style="margin-left: 45%;" >Môn học:</label>
				<select style=" width: 30%" id="select_monhoc">
					<option value="">Tất cả</option>
					@foreach($monhoc as $key)
					<option value="{{$key->MaMonHoc}}">{{$key->TenMonHoc}}</option>	       
					@endforeach
				</select>
			</div>
			<div class="bomon" style="width: 100%; height: 95%;">
				@include('error')
				<div class="wrap">
					<div class="over">
						<table id="example" class="table table-hover table-striped table-bordered"  style="width: 100%;" align="center" border="1">
							<thead>
						        <tr>
						        	<th style="width: 5%">ID</th>
						            <th style="width: 10%">Tiêu đề</th>
						            <th style="width: 10%">Ngày tạo</th>
						            <th style="width: 5%">Môn học</th>
						            <th style="width: 5%">Xem nội dung</th>
						            <th style="width: 5%">Xuất file</th>
						            <th style="width: 5%">Xuất đề online</th>
						            <th style="width: 5%">Xóa đề online</th>
						            <th style="width: 5%">Xem kết quả thi</th>
						        </tr>
						    </thead>
						    <tbody>
					   		<?php $i=1; ?>
					        @foreach($made as $key)
						        <tr >
							    	<td><?php echo $i++; ?></td>
						 	        <td>{{$key->TieuDe}}</td>
						 	        <td>{{$key->NgayTao}}</td>
						 	        <td>{{$key->MaMonHoc}}</td>
						            <td><button id ="xem"  data-id="{{$key->IDDeThi}}" class="btn btn-info" ><i class="fa fa-eye" style="color: white;"></i></button></td>
						            <td><button id="xuat"  data-id="{{$key->IDDeThi}}" class="btn btn-success" ><i class="fa fa-download" style="color: white;"></i></button></td>
						            @if($key->Test == 1)
						            <td><button disabled  id="thithu"  data-id="{{$key->IDDeThi}}" class="btn btn-primary" ><i class="fa fa-check" style="color: white;"></i></button></td>
						            @else
						            <td><button id="thithu"  data-id="{{$key->IDDeThi}}" class="btn btn-primary" ><i class="fa fa-check" style="color: white;"></i></button></td>
						            @endif
						            <td><button id="xoadeonl"  data-id="{{$key->IDDeThi}}" class="btn btn-danger" ><i class="fa fa-trash" style="color: white;"></i></button></td>
						            <td><button id="xemkqt"  data-id="{{$key->IDDeThi}}" class="btn btn-info" ><i class="fa fa-eye" style="color: white;"></i></button></td>
						        </tr>
					        @endforeach
						    </tbody>
						</table>								
					</div>
				</div>
			</div>
		</div>

<!-- modal xuất đề thi -->
		<div class="modal" id="modaldethi" role="dialog">
		  	<div class="modal-dialog" role="document">
		   		<div class="modal-content">
		       		<div class="modal-header">
		        		<h5 class="modal-title">Xuất đề thi</h5>
		      		</div>
		      		<form action="{{URL::to('xuatde')}}" method="POST">
		      			@csrf
		      		<div class="modal-body">
		       			Nhập mã đề: <input type="text" name="made" id="made">
		       			<input hidden="true" type="text" name="idde" id="idde">
		      		</div>
		      		<div class="modal-footer">
		   				<button  type="submit" class="btn btn-primary">Xuất</button>
		       			<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
		      		</div>
		      	</form>
		    	</div>
		  	</div>
		</div>

<!--modal xuất đề thi online -->
				<div class="modal" id="pass_dethi" role="dialog">
			  	<div class="modal-dialog" role="document">
			   		<div class="modal-content">
			       		<div class="modal-header">
			        		<h5 class="modal-title">Nhập mật khẩu đề thi</h5>
			      		</div>
			      		<form action="{{URL::to('xuatthithu')}}" method="POST">
			      		@csrf
				      		<div class="modal-body">
				      			<table style="width: 100%">
					      			<tr>
					      				<th>Mật khẩu: </th>
					       				<td>
					       					<input class="form-control" type="password" name="pass" id="pass" required>
					       					<input class="form-control" type="text" name="madethi" id="madethi" required hidden>
					       				</td>
					       			</tr>
				       			</table> 			
				      		</div>
				      		<div class="modal-footer">
				   				<button  type="submit" class="btn btn-primary">Xuất đề</button>
				       			<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
				      		</div>
			      	    </form>
			    	</div>
			  	</div>
			</div>

<!-- modal xem kết quả thi -->
			<div class="modal" id="xemketquathi" role="dialog">
			  	<div class="modal-dialog" role="document" >
			   		<div class="modal-content">
			       		<div class="modal-header">
			        		<h5 class="modal-title">Kết quả thi</h5>
			      		</div>
			      		<div class="modal-body"style=" height:400px; overflow: auto;">
			      			<table id="xemkqthi" class="table table-hover table-striped table-bordered"  style="width: 100%;" align="center" border="1">
                				<thead>
                    				<th style="width:23%">Mã sinh viên</th>
                    				<th style="width:54%">Họ tên</th>
                    				<th style="width:23%">Tỉ lệ đúng</th>
               					 </thead>
               					 <tbody id="ketquathi">
               					 </tbody>
			      			</table>
			      		</div>
			      		<div class="modal-footer">
			      			<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
			      		</div>
			    	</div>
			  	</div>
			</div>

<!-- modal xem đề thi -->
			<div class="modal" id="xemdethi" role="dialog">
			  	<div class="modal-dialog modal-lg" role="document">
			   		<div class="modal-content" >
			       		<div class="modal-header">
			        		<h5 class="modal-title">Nội dung đề thi</h5>
			      		</div>
			      		<div class="modal-body" style=" height:400px; overflow: auto;">
			      			<div id="noidung" >
			       			</div>			
			      		</div>
			      		<div class="modal-footer">
			      			<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
			      		</div>
			    	</div>
			  	</div>
			</div>

<!-- modal xuất đề thành công -->
			<div class="modal" id="success">
			   <div class=" alert alert-success alert-dismissible">
			    <a href="#" class="close" data-dismiss="modal" aria-label="close">&times;</a>
			    <strong>Hoàn thành!</strong> Xuất đề thi thành công!
			  </div>
			</div>

<!-- modal xóa đề thành công -->
			<div class="modal" id="successdel">
			   <div class=" alert alert-success alert-dismissible">
			    <a href="#" class="close" data-dismiss="modal" aria-label="close">&times;</a>
			    <strong>Hoàn thành!</strong> Xóa đề thi thành công!
			  </div>
			</div>

<!-- modal xuất đề thất bại -->
			<div class="modal" id="error">
			   <div class="alert alert-danger alert-dismissible">
			    <a href="#" class="close" data-dismiss="modal" aria-label="close">&times;</a>
			    <strong>Lỗi!</strong> Xuất đề thi thất bại!
			  </div>
			</div>

<!-- modal xóa đề thất bại -->
			<div class="modal" id="errordel">
			   <div class="alert alert-danger alert-dismissible">
			    <a href="#" class="close" data-dismiss="modal" aria-label="close">&times;</a>
			    <strong>Lỗi!</strong> Xóa đề thi thất bại!
			  </div>
			</div>

		@if(\Session::get('phanquyen') == '03')
<!-- search môn học GV -->
		<script type="text/javascript">
			$(document).ready(function() 
			{
            	$("#select_monhoc").select2({
                    placeholder: "Chọn môn học...",
                    allowClear: true
             	});
        	});

	        $('select').on('change',function()
	        {
			    $value = $(this).children('option:selected').val();
			    $.ajax({
			        type: 'get',
			        url: '{{ URL::to('searchdethi') }}',
			        data: {
			              'search': $value
			        },
			        success:function(data){
			        	$('tbody').html(data);
			        }
			    });
		    }); 
		  </script>
		  @else
 <!-- search môn học TBM -->
		  <script type="text/javascript">
		  	$(document).ready(function() 
		  	{
            	$("#select_monhoc").select2({
                    placeholder: "Chọn môn học...",
                    allowClear: true
             	});
        	});

	        $('select').on('change',function()
	        {
			    $value = $(this).children('option:selected').val();
			    $.ajax({
			        type: 'get',
			        url: '{{ URL::to('searchdethitbm') }}',
			        data: {
			              'search': $value
			        },
			        success:function(data)
			        {
			        	$('tbody').html(data);
			        },
			        error:function()
			        {
			        	alert("sahdvjh");
			        }
			    });
		    }); 
		  </script>
		  @endif


		  <script type="text/javascript">
// xem đề thi
			$(document).on('click', '#xem', function()
			{ 
				$value = $(this).data('id'); 
			  	$.ajax({

		            type: 'get',
		            url: '{{ URL::to('xemnoidungde') }}',
		            data: {
		                  'search': $value
		            },
		            success:function(data){
		            	$("#xemdethi").modal('show');
		                $('#noidung').html(data); 
		            }      
				});
			});

//xem ket qua thi		
			$(document).on('click', '#xemkqt', function()
			{ 
				$value = $(this).data('id');
			  	$.ajax({

		            type: 'get',
		            url: '{{ URL::to('xemketquathi') }}',
		            data: {
		                  'idde': $value
		            },
		            success:function(data){
		            	$("#xemketquathi").modal('show');
		                $('#ketquathi').html(data); 
		            }      
				});
			});

// check pass
			$(document).on('click', '#thithu', function()
			{ 
				$value = $(this).data('id'); 
				$('#madethi').val($value);
				$('#pass_dethi').modal('show');
			});

// xuất đề thi
			$(document).on('click','#xuat',function()
			{ 
				$id = $(this).data('id');
				$('#idde').val($id);
				$("#modaldethi").modal('show');
				
			});

// data table
			$(document).ready(function() 
			{
			    $('#example').DataTable({
			        "paging":   false,
			        "info":     false
			    });
			});
			$(document).ready(function() 
			{
			    $('#xemkqthi').DataTable({
			        "paging":   false,
			        "info":     false
			    });
			});

//xoa de online
			$(document).on('click',"#xoadeonl", function()
			{
				$idde = $(this).data('id');
				$value = confirm("Bạn có chăc muốn xóa đề thi online?");
				if($value)
				{
					$.ajax({
			            type: 'get',
			            url: '{{ URL::to('xoadeonl') }}',
			            data: {
			                  'idde': $idde
			            },
			            success:function(){
			                $('#successdel').modal('show');
			                location.reload();
			            },   
			            error:function(){
			            	$('#errordel').modal('show');
			            }   
					});
				}
			});

			// $(document).on('click',"#xoadegoc", function()
			// {
			// 	$idde = $(this).data('id');
			// 	$value = confirm("Bạn có chăc muốn xóa đề thi gốc?");
			// 	if($value)
			// 	{
			// 		$.ajax({
			//             type: 'get',
			//             url: '{{ URL::to('xoadegoc') }}',
			//             data: {
			//                   'idde': $idde
			//             },
			//             success:function(){
			//                 $('#successdel').modal('show');
			//                 location.reload();
			//             },   
			//             error:function(){
			//             	$('#errordel').modal('show');
			//             }   
			// 		});
			// 	}
			// });

	    </script>
	</body>
</html>