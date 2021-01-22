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
		<title>Kết quả bài kiểm tra</title>
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
		<script src="{!! asset('js/dataTables.bootstrap4.min.js') !!}"></script>
		<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
		<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
	</head>
	<body>
		<div class="menund" id="menund" style="height: 90%; text-align: center;">
			<div>
				<label style="font-size: 150%; font-weight: bold; color: rgb(223,43,140); margin-left: 1%;">BẠN ĐÃ HOÀN THÀNH BÀI KIỂM TRA!</label><br><br>
			</div>
			<div class="table1" style="width: 100%; height: 100%;text-align: center;">
				<table class="table table-hover table-striped table-bordered" border="1" align="center" style="width: 40%; text-align: center; " cellpadding="10">
					<thead>
						<th>Số câu đúng/{{$slch}}</th>
						<th>Điểm số/100</th>
					</thead>
					<?php 
						$d=$diem*100/$slch;
						$d=number_format((float)$d, 3, '.', '');
					 ?>
					<tbody>
						<td>{{$diem}}</td>
						<td>{{$d}}</td>
					</tbody>
				</table>
				<form method="get" action="{{url('thi')}}">
					@csrf
					<br><button class="btn btn-info" href="thi">Trở về</button>
				</form>
			</div>
		</div>
	</body>
</html>