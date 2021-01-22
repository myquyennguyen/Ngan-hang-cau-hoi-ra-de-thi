<html>
	<head>
		<title>Xem câu hỏi</title>
	</head>
	<body>
		<div class="menund">
			<div>
				<label style="font-size: 150%; font-weight: bold; color: rgb(223,43,140); margin-left: 1%;">Xem câu hỏi</label>
				<label style="margin-left: 45%;" >Môn học:</label>
					<select style="width: 30%" id="states">
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
			<div class="table2" style="width: 49%; height: 100%; overflow: auto">
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
		</div>

	@if(\Session::get('phanquyen') == '02')
		<script type="text/javascript">
			$(document).ready(function() {
            $("#states").select2({
                    placeholder: "Chọn môn học...",
                    allowClear: true
             });
        	});
	        $('select').on('change',function()
	        {
			    $value = $(this).children('option:selected').val();
			    $.ajax({
			        type: 'get',
			        url: '{{ URL::to('searchxchTBM') }}',
			        data: 
			        {
			              'search': $value,
			        },
			        success:function(data)
			        {
			        	$('tbody').html(data);
			        }
			    });
		    }); 
		</script>
	@else
		<script type="text/javascript">
			$(document).ready(function() {
            $("#states").select2({
                    placeholder: "Chọn môn học...",
                    allowClear: true
             });
        	});
	        $('select').on('change',function()
	        {
			    $value = $(this).children('option:selected').val();
			    $.ajax({
			        type: 'get',
			        url: '{{ URL::to('searchxch') }}',
			        data: 
			        {
			              'search': $value,
			        },
			        success:function(data)
			        {
			        	$('tbody').html(data);
			        }
			    });
		    }); 
		</script>
	@endif
	<script type="text/javascript">
		$(document).on('click', '#button', function()
		{ 
			$value = $(this).data('id'); 
		  	$.ajax({

	            type: 'get',
	            url: '{{ URL::to('xemxch') }}',
	            data: 
	            {
	                  'search': $value,
	            },
	            success:function(data)
	            {
	                $('#noidung').html(data); 
	            }      
			});
		});

		$(document).ready(function() {
			    $('#example').DataTable( {
			        "paging":   false,
			        "info":     false
			    } );
			} );
    </script>
	</body>
</html>