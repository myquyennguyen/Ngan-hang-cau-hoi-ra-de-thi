@if (!\Session::has('usernamesv')) 
		<script type="text/javascript">
		    window.location = "{{ URL::to('login')}}";
		</script>
@endif
<html>
	<head>
		<script language="javascript" type="text/javascript">
			window.history.forward();
		</script>
		<title>Thi</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width", initial-scale=1.0>
		<link rel="stylesheet" href="{!! asset('css/layout.css') !!}">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="{!! asset('css/dataTables.bootstrap4.min.css') !!}">
		<link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap.css') !!}">
		<script src="{!! asset('js/jquery-3.5.1.js') !!}"></script>
		<script src="{!! asset('js/jquery.dataTables.min.js') !!}"></script>
		<script src="{!! asset('js/dataTables.bootstrap4.min.js') !!}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
		<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
	</head>
	<body>
		<div class="menund" id="menund" style="height: 90%; text-align: center;">
			<div>
				<label style="font-size: 150%; font-weight: bold; color: rgb(223,43,140); margin-left: 1%; margin-bottom: 0%">KIỂM TRA ONLINE</label><br>
				<label>Môn học:</label>
					<select style="30%" id="states">
						<option value="">Tất cả</option>
						@foreach($mon as $key)
						<option value="{{$key->MaMonHoc}}">{{$key->TenMonHoc}}</option>	       
						@endforeach
					</select>
			</div>
			<div class="table1" style="width: 100%; height: 100%;text-align: center;">
				<div class="wrap" style="text-align: center;">
					<div class="over" style="text-align: center;">
						<table id="example" class="table table-hover table-striped table-bordered"  style="width: 70%;" align="center" border="1" align="center">
							<thead>
						        <tr>
						        	<th style="width: 5%">ID</th>
						            <th style="width: 10%">Tiêu đề</th>
						            <th style="width: 10%">Kiểm tra</th>
						        </tr>
						    </thead>
						    <tbody id="table">
					   		<?php $i=1; ?>
					        @foreach($made as $key)
						        <tr >
							    	<td><?php echo $i++; ?></td>
						 	        <td>{{$key->TieuDe}}</td>
						            <td><button id ="thi"  data-id="{{$key->IDDeThi}}" class="btn btn-outline-primary" >Bắt đầu làm bài</button></td>
						        </tr>
					        @endforeach
						    </tbody>
						</table>			
					</div>
				</div>
			</div>
		</div>
		<!--Check pass de thi-->
			<div class="modal" id="checkpass" role="dialog">
			  	<div class="modal-dialog" role="document">
			   		<div class="modal-content">
			       		<div class="modal-header">
			        		<h5 class="modal-title">Nhập mật khẩu đề thi</h5>
			      		</div>
			      		<form action="{{URL::to('kiemtramatkhau')}}" method="POST">
			      		@csrf
				      		<div  class="modal-body">
				      			<table style="width: 100%">
					      			<tr>
					      				<th>Mật khẩu: </th>
					       				<td>
					       					<input class="form-control" type="password" name="checkpass" id="checkpass" required>
					       					<input class="form-control" type="text" name="madethi" id="madethi" required hidden>
					       				</td>
					       			</tr>
				       			</table> 			
				      		</div>
				      		<div class="modal-footer">
				   				<button  type="submit" class="btn btn-primary">OK</button>
				       			<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
				      		</div>
			      	    </form>
			    	</div>
			  	</div>
			</div>
		<script type="text/javascript">

//select2 cho môn học
	        $(document).ready(function() 
	        {
	            $("#states").select2({
	                    placeholder: "Chọn môn học...",
	                    allowClear: true
	             });
	        });

//search môn học
			$('select').on('change',function()
			{
			    $value = $(this).children('option:selected').val();
				    $.ajax({
			        type: 'get',
			        url: '{{ URL::to('searchdethithu') }}',
			        data: {
			              'search': $value
			        },
			        success:function(data){
			        	$('#table').html(data);
			        }
			    });
		    }); 
//check pass thi
			$(document).on('click', '#thi', function()
			{ 
				$value = $(this).data('id'); 
				$('#madethi').val($value);
				$('#checkpass').modal('show');
			});

	    </script>
	</body>
</html>