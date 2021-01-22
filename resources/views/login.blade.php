<html>
	<head>
		<title>Đăng nhập</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width", initial-scale=1.0>
		<link rel="stylesheet" href="{!! asset('css/layout.css') !!}">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap.css') !!}">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</head>
	<body>
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
								@include('error')
								<div class="menu">
									<label id="home"><a href="trangchu"><i class="fa fa-home"></i> Trang chủ</a></label>
									<label id="login"><a href=#>Đăng nhập <i class="fa fa-sign-in"></i></a></label>
								</div>
								<div class="img">
									<div class="loginbackground1" style="margin: 10px auto;">
										<div class="loginbackground2">
											<form  action="{{URL::to('postlogin')}}" method="post" class="form11">
												 @csrf
													<div >
														<label id="dangnhap" align="center" >Đăng nhập</label>
													</div>	
													
													<div class="form-group">
														<i class="fa fa-user"></i> 
														<label> Tên đăng nhập</label>
														<input type="text" id="username" name="username" class="form-control" required>
													</div>
													<div class="form-group">
														<i class="fa fa-eye-slash"></i>
														<label> Mật khẩu</label>
														<input type="password" id="password" name="password" class="form-control" required>
													</div>
												
													<div class="form-group">
														<i class="fa fa-globe"></i>
														<label class="col-form-label"> Chức vụ</label>
														<select id="phanquyen" name="phanquyen" class="form-control">
			
														@foreach($quyen as $pq)
															<option value="{{$pq->MaPhanQuyen}}">{{$pq->TenPhanQuyen}}</option>
														@endforeach
														</select>
													</div>
												<br>
													<div class="form-group">
														<label style="width: 100%" align="center"><button class=" btn btn-primary" type="submit" name="btn_submit"> Đăng nhập</button></label>
													</div>
												
											</form>
										</div>
									</div>
								</div>
							</div>
						</div> 
						<div class="footer" style="font-family: arial">
								<marquee>Khoa Công nghệ thông tin và truyền thông-Trường Đại học Cần Thơ, Khu 2 đường 3/2, P.Xuân Khánh, Q.Ninh Kiều, TP.Cần Thơ</marquee>
							</div>  
					</div> 
				</div>
			</div>
		</div>
	</body>
</html>