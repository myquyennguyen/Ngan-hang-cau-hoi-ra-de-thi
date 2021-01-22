@if(!(\Session::get('phanquyen') == '02'))
	<script type="text/javascript">
		window.location = "{{ URL::to('login')}}";
	</script>
@endif
<html>
	<header>
		<title>Duyệt câu hỏi</title>
	</header>
	<body>
		<div class="menund">
			<div>
				<label style="font-size: 150%; font-weight: bold; color: rgb(223,43,140); margin-left: 1%;">Duyệt câu hỏi</label>
				@include('error')
				<label style="margin-left: 40%;">Môn học:</label>
				<select style="width: 30%" id="slmonhoc">
					<option value="">Tất cả</option>
					@foreach($mon as $key)
						<option value="{{$key->MaMonHoc}}">{{$key->TenMonHoc}}</option>				        
					@endforeach
				</select>
			</div>
			<div class="table1" style="width: 50%; height: 100%;">
				<div class="wrap">
					<div class="over">
						<table id="example" class="table table-hover table-striped table-bordered"  style="width: 100%;" align="center" border="1">
							<thead>
						        <tr>
						        	<th style="width: 5%">ID</th>
						            <th style="width: 30%">Môn học</th>
						            <th style="width: 10%">Mức độ</th>
						            <th style="width: 40%">Nội dung</th>
						            <th style="width: 10%">Xem</th>
						        </tr>
						    </thead>
						    <tbody>
					   		<?php $i=1; ?>
					        @foreach($cau as $key)
						        <tr >
							    	<td><?php echo $i++; ?></td>
						            <td>{{$key->TenMonHoc}}</td>
						 	        <td>{{$key->MucDo}}</td>
						            <td>{{$key->CHNoiDung}}</td>
						            <td><button id="button"  data-id="{{$key->IDCauHoi}}" class="btn btn-primary " ><i class="fa fa-eye" style="color: white;"></i></button></td>
						        </tr>
					        @endforeach
						    </tbody>
						</table>	
													
					</div>
				</div>
			</div>
			
<form method="post" action="duyetch">
			@csrf
			<div  class="table2" style="width: 49%; height: 100%">
				<div class="wrap">
					<div class="over">
						<div id="noidung">
						<label><b>Câu hỏi</b></label><br>
						<textarea class="alert alert-info" style="width: 100%; height: auto; border:2px solid blue;"></textarea>
						<br><br><label><b>Đáp án</b></label>
						&nbsp;<textarea class="alert alert-success" style="width: 100%; height: auto; border:1px solid green;"></textarea>
						&nbsp;<textarea class="alert alert-danger" style="width: 100%; height: auto; border:1px solid red;"></textarea>
						&nbsp;<textarea class="alert alert-danger" style="width: 100%; height: auto; border:1px solid red;"></textarea>
						&nbsp;<textarea class="alert alert-danger" style="width: 100%; height: auto; border:1px solid red;"></textarea>
						</div>
					</div>
				</div>
			</div>
</form>
		</div>

		<div class="modal fade" id="xoach" role="dialog">
    			<div class="modal-dialog">
    				<div class="modal-content">
        				<h4 class="modal-title">Xóa câu hỏi</h4>
						<form method="post" action="xoach"> 	
        				@csrf
        					<div class="modal-body">
     							<label>Bạn có chắc muốn xóa câu hỏi không?</label>
     							<input hidden type="text" name ="stt" id="stt">
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
		$(document).ready(function() {
	            $("#slmonhoc").select2({
	                    placeholder: "Chọn môn học ...",
	                    allowClear: true
	             });
	        });

        $('select').on('change',function(){
	    	$value = $(this).children('option:selected').val();
	   	    $.ajax({
                type: 'get',
	            url: '{{ URL::to('searchdch') }}',
	            data: 
	            {
	                'search': $value
	            },
	            success:function(data)
	            {
	                $('tbody').html(data);
	            }
	        });
	    });  
	    
     	$(document).on('click', '#button', function()
     	{ 
			$value = $(this).data('id'); 
	  		$.ajax({
	            type: 'get',
	            url: '{{ URL::to('xemdch') }}',
	            data: 
	            {
	                  'search': $value
	            },
	            success:function(data)
	            {
	                $('#noidung').html(data); 
	            }      
			});
		});

    	$(document).ready(function() 
    	{
		    $('#example').DataTable( 
		    {
		        "paging":   false,
		        "info":     false
		    });
		});

		$(document).on('click','#xoa',function()
			{
				$id = $('#idch').val();
				$('#stt').val($id);
				$('#xoach').modal('show');
			});
    	</script>
	</body>
</html>