@if (!\Session::has('usernamesv')) 
	<script type="text/javascript">
	    window.location = "{{ URL::to('login')}}";
	</script>
@endif
<?php
	$time = DB::table('bailam')
		->join('dethi','bailam.IDDeThi','dethi.IDDeThi')
		->where('bailam.IDBaiLam','=',$id)
		->pluck('ThoiGianLamBai');
	$minute = $time[0];
?>
<html>
	<head>
		<script language="javascript" type="text/javascript">
			window.history.forward();
		</script>
	</head>
	<body>								
		<div class="menu2">
			<div class="menu2border">
				<div class="tacvu">
					<label>Câu hỏi</label>
				</div>
				<div class="cau_hoi" style="overflow-y: auto; height: 50%;">
				@for($i=1;$i<=$slch;$i++)
					<div id="cau{{$i}}" style="width: 30px; height: 30px; border: 1px solid blue; text-align: center; margin: 2px; padding-top: 1px; float:left;">{{$i}}
					</div>
				@endfor
				</div>
			</div>
			<div style="font-style: arial; font-size: 90%">
				<br><label><b><i>Thời gian còn lại:</i></b></label>
				<div id="tg">
					<label id="minute"></label><label>&nbsp;phút</label>
					<label id="second"></label><label>&nbsp;giây</label>
				</div>
			</div>
			<div>
				<form id="luudapan" action="{{URL::to('luudapan')}}" method="post" >
					@csrf
					<input hidden type="text" name="idbailam" value="{{$id}}">
					<input hidden type="text" name="slch" value="{{$slch}}">
					<input id="luudapan" align="center" style="width: 100%" class="btn btn-warning" type="button" value="Lưu nhưng không nộp bài">
				</form>
			</div>
		</div>
		<script type="text/javascript">

			if(localStorage.getItem('minute') == null)
			{			
				var	minute = <?php echo json_encode($minute)?>;
				var	second = 0;
				localStorage.setItem('minute', minute);
				localStorage.setItem('second', second);
			}
			else
			{  
				minute = localStorage.getItem('minute');
				second = localStorage.getItem('second');
			}
						
			function demNguoc()
			{
				second--;
				if(minute==0 && second<11)
					$('#tg').css('background-color','red');
				if(minute >= 0)
				{
					if(second >= 0)
					{
						document.getElementById('minute').innerHTML = minute;
						document.getElementById('second').innerHTML = second;
						localStorage.setItem('minute', minute);
						localStorage.setItem('second', second);
						setTimeout("demNguoc()",1000);
					}
					else
					{
						minute--;
						second = 60;
						localStorage.setItem('minute', minute);
						localStorage.setItem('second', second);
						setTimeout("demNguoc()",1000);
					}
				}
				else
				{
					localStorage.clear();
					document.getElementById('nopbai').submit();
				}
			}
			demNguoc();

			function clearTime() 
			{
				if(confirm("Bạn có chắc muốn nộp bài và kết thúc không?") == true)
				{
					minute = -1;
					second = -1;
					localStorage.clear();
					document.getElementById('nopbai').submit();
				}
			}

		</script>  
			
		<div class="screen">
			<div style="width: 100%; text-align: center;">

				<label style="font-size: 150%; font-weight: bold; color: rgb(223,43,140); margin-left: 1%; margin-bottom: 0%">BÀI KIỂM TRA ONLINE</label>
			</div>
			<div class="wrap">
				<div class="over" style="padding-left: 30px; padding-right: 30px;">
					<form id="nopbai" name="nopbai" method="POST" action="{{url('nopbai')}}">
						@csrf
						<?php
						echo $output;
						?>
						<div class="button">
							<button onclick="clearTime()" class="btn btn-success"  >Nộp bài</button>
						</div>
					</form>	
				</div>
			</div>
		</div>
		<script type="text/javascript">
			$(document).on('click','.cauhoi', function()
			{
				var id = $(this).attr('name');
				$('#'+id).css('border','3px solid blue');
				$('#'+id).css('background-color','rgb(153,180,250)');
			});

			$('#luudapan').on('click', function(e)
			{
				e.preventDefault();
				$.ajax({
					type: 'post',
					url:'{{ URL::to('luudapan') }}',
					data : $('#nopbai').serialize(),
				});  
			});  
		</script>
	</body>
</html>