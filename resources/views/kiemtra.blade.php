@if (!\Session::has('usernamesv')) 
		<script type="text/javascript">
		    window.location = "{{ URL::to('login')}}";
		</script>
@endif
<html>
	<head>
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
	</head>
	<body>
		@include('error')
		<div class="container-fluid" style="width: 100%; height: 100%">
			<div class="row" style="background-color: rgb(72,151,236); height: 100%;" >
				<div class="col-sm">
					<div class="background1"> 
						<div class="background2">
							<div class="background3">
								<div class="banner">
									<div style="width: 62%; margin: 0 auto;">
										<div class="logo">
											<img src="{!! asset('image/ctu.png') !!}" style="width: 100%; height: 100%;">
										</div>
										<div class="banner2">
											<label class="label1">KHOA CÔNG NGHỆ THÔNG TIN VÀ TRUYỀN THÔNG</label><br>
											<label>HỆ THỐNG NGÂN HÀNG CÂU HỎI RA - ĐỀ THI</label>
										</div>
									</div>
								</div>
								<div class="menu">
									<label id="home"><a href="trangchu"><i class="fa fa-home"></i> Trang chủ</a></label>
									<label id="login">({{\Session::get('usernamesv')}})<a href="logout">Đăng xuất <i class="fa fa-sign-in"></i></a></label>
								</div>
								<div class="img">
										@include($view_thi)
								</div>
							</div>
						</div> 
						<div class="footer">
							<marquee style = "font-family: arial">Khoa Công nghệ thông tin và truyền thông-Trường Đại học Cần Thơ, Khu 2 đường 3/2, P.Xuân Khánh, Q.Ninh Kiều, TP.Cần Thơ</marquee>
						</div>  
					</div> 
				</div>
			</div>
		</div>
	</body>
</html>
