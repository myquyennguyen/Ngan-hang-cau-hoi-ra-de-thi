@if (\Session::has('usernamead')) 
		@extends('layout')
		@section('user')
		<div class="menu">
			<label id="home"><a href="trangchu"><i class="fa fa-home"></i> Trang chủ</a></label>
			<label id="login">({{\Session::get('usernamead')}})<a href="logout">Đăng xuất <i class="fa fa-sign-in"></i></a></label>
		</div>
		@endsection
		@section('task1')
			<label><img src="{!! asset('image/taikhoan.PNG') !!}" style="width: 30px; height: auto;"> <a class="linkpage" href="cntaikhoan" target="_self">Quản lý tài khoản</a></label>
		@endsection
		@section('task2')
			<label><img src="{!! asset('image/canbo.PNG') !!}" style="width: 30px; height: auto;"> <a class="linkpage" href="cncanbo" target="_self">Quản lý cán bộ</a></label>
		@endsection
		@section('task3')
			<label><img src="{!! asset('image/canbo.PNG') !!}" style="width: 30px; height: auto;"> <a class="linkpage" href="cnsinhvien" target="_self">Quản lý sinh viên</a></label>
		@endsection
		@section('task4')
			<div class="task">
				<label><img src="{!! asset('image/bomon.PNG') !!}" style="width: 30px; height: auto;"> <a class="linkpage" href="cnbomon" target="_self">Quản lý bộ môn</a></label>
			</div>
		@endsection
		@section('content')
			<!--  <?php $path=resource_path('views/capnhattaikhoan123'); ?>
			<iframe src="cntaikhoan" name="noidung" width="100%" height="100%" border="none">
			</iframe>  -->
			@if(isset($view2))
				@if($view2 == 'cntaikhoan')
					@include('capnhattaikhoan')
				@elseif($view2 == 'cncanbo' )
					@include('capnhatcanbo')
				@elseif($view2 == 'cnbomon')
					@include('capnhatbomon')
				@elseif($view2 == 'cnsinhvien')
					@include('capnhatsinhvien')
				@endif
			@endif 
		@endsection

@else
	<script type="text/javascript">
		window.location = "{{ URL::to('login')}}";
	</script>
@endif