@if (\Session::has('username') && \Session::get('phanquyen') == '02')
@extends('layout')
	@section('user')
		
		<div class="menu">
			<label id="home"><a href="trangchu"><i class="fa fa-home"></i> Trang chủ</a></label>
			<label id="login">({{\Session::get('username')->name}})<a href="logout">Đăng xuất <i class="fa fa-sign-in"></i></a></label>
		</div>
	@endsection
@section('task1')
	<label><img src="{!! asset('image/duyetdethi.PNG') !!}" style="width: 30px; height: auto;"><a class="linkpage" href="duyetcauhoi" target="_self">Duyệt câu hỏi</a></label>
@endsection
@section('task2')
	<label><img src="{!! asset('image/xemcauhoi.PNG') !!}" style="width: 30px; height: auto;"><a class="linkpage" href="xemcauhoitbm" target="_self">Xem câu hỏi</a></label>
@endsection
@section('task3')
	<label><img src="{!! asset('image/taodethi.PNG') !!}" style="width: 30px; height: auto;"><a class="linkpage" href="taodethitbm" target="_self">Tạo đề thi</a></label> 
@endsection
@section('task4')
	<div class="task">
	<label><img src="{!! asset('image/xemdethi.PNG') !!}" style="width: 30px; height: auto;"><a class="linkpage" href="xemdethitbm" target="_self">Xem đề thi</a></label>
	</div>
@endsection
@section('content')
	@if(isset($view2))
			@if($view2 == 'duyetcauhoi')
				@include('duyetcauhoi')
			@elseif($view2 == 'xemcauhoi' )
				@include('xemcauhoi')
			@elseif($view2 == 'taodethi')
				@include('taodethi')
			@elseif($view2 == 'xemdethi')
				@include('xemdethi')
			@endif
		@endif 
@endsection
@else
		<script type="text/javascript">
		    window.location = "{{ URL::to('login')}}";
		</script>
@endif
