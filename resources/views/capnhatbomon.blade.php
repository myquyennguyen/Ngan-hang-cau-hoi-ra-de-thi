<html>
		<header>
			<title>Cập nhật bộ môn</title>
		</header>
		<body>
			<div class="menund">
				<label style="font-size: 150%; font-weight: bold; color: rgb(223,43,140); margin-left: 1%; margin-bottom: -1%">Cập nhật bộ môn - môn học</label>
				@include('error')
				<div>
					<div class="table1" style="width: 50%;">
						<label class="tdtable">Danh sách bộ môn</label><br>
						<div class="wrap">
							<div class="over" style="height: 67%;">
								<table id="bomon" class="table table-hover table-striped table-bordered"  style="width: 100%;font-size: 100%">
									<thead>
								        <tr>
									     	<th style="width: 10%">STT</th>
								            <th style="width: 20%">Mã</th>
								            <th style="width: 65%">Tên</th>
								            <th style="width: 5%">Sửa</th>
								        </tr>
								    </thead>
								    <tbody>
								  	<?php $i=1; ?>
							        @foreach($bomon as $row)
								        <tr>
								        	<td ><?php echo $i++; ?></td>
								            <td id="mabm_{{$i-1}}" data-id="{{$row->MaBoMon}}">{{$row->MaBoMon}}</td>
								            <td id="tenbm_{{$i-1}}" data-id="{{$row->TenBoMon}}">{{$row->TenBoMon}}</td>
		   					                <td><button id="suabomon" data-id="{{$i-1}}" class="btn btn-primary" ><i class="fa fa-edit" style="color: white;"></i></button></td>
								        </tr>
							        @endforeach
								    </tbody>
								</table>											
							</div>
						</div>
						<div class="button">
							<button id="thembomon" class="btn btn-success" name="thembm"  type="button">Thêm bộ môn</button>
						</div>
					</div>								
					<div class="table2" style="width: 49%;">
						<label class="tdtable">Danh sách môn học</label>
						<div class="wrap">
							<div class="over" style="height: 67%;">
								<table id="monhoc" class="table table-hover table-striped table-bordered" style="width:100%; font-size: 100%" >
									<thead>
								        <tr>
									        <th style="width: 10%">STT</th>
								            <th style="width: 20%">Mã</th>
								            <th style="width: 65%">Tên môn</th>
								            <th style="width: 5%">Sửa</th>
								        </tr>
								    </thead>
								    <tbody>
							   		<?php $i=1; ?>
									@foreach($monhoc as $rowmh)
								        <tr>
								        	<td><?php echo $i++; ?></td>
								            <td id="ma_{{$i-1}}" data-id="{{$rowmh->MaMonHoc}}">{{$rowmh->MaMonHoc}}</td>
								            <td id="ten_{{$i-1}}" data-id="{{$rowmh->TenMonHoc}}">{{$rowmh->TenMonHoc}}</td>
								             <td><button id="suamonhoc" data-id="{{$i-1}}" class="btn btn-primary" ><i class="fa fa-edit" style="color: white;"></i></button></td>
								             <input hidden id="mabm_{{$i-1}}" data-id="{{$rowmh->MaBoMon}}">
								        </tr>
							        @endforeach
								    </tbody>
								</table>
							</div>											
						</div>
						<div class="button">
							<button id="themmonhoc" class="btn btn-success" name="themmh" type="button">Thêm môn học</button>
						</div>
					</div>
				</div>
			</div>

<!-- modal cập nhật môn học -->
		<div class="modal" id="updatemonhoc" role="dialog">
		  	<div class="modal-dialog" role="document">
		   		<div class="modal-content">
		       		<div class="modal-header">
		        		<h5 class="modal-title">Cập nhật môn học</h5>
		      		</div>
		      		<form  action="{{URL::to('update_monhoc')}}" method="POST">
		      		@csrf
		      			<div class="modal-body">
		      				<table style="width: 100%">
		      					<tr>
			                		<td>Tên môn học:</td>
			                		<td><input class="form-control" type="text" id="ten_edit" name="ten_edit" required></td>
			                	</tr>
						       	<tr>
					      			<td>Bộ môn: </td>
				     				<td>
			    	   					<select name ="bomon_edit" id="bomon_edit" class="form-control">
											@foreach($bomon as $bm)
												<option value="{{$bm->MaBoMon}}">{{$bm->TenBoMon}}</option>
											@endforeach
										</select>
				       				</td>
			      				</tr>
		       				</table> 			
		      			</div>
		      			<div class="modal-footer">
		      				<input hidden="true" type="text" name="mamh" id="mamh">	
		   					<button  type="submit" class="btn btn-primary">Cập nhật</button>
		       				<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
		      			</div>
		    	  	</form>
		    	</div>
		  	</div>
		</div>

<!-- modal cập nhật bộ môn -->
		<div class="modal" id="updatebomon" role="dialog">
		  	<div class="modal-dialog" role="document">
		   		<div class="modal-content">
		       		<div class="modal-header">
		        		<h5 class="modal-title">Cập nhật bộ môn </h5>
		      		</div>
		      		<form  action="{{URL::to('update_bomon')}}" method="POST">
		      		@csrf
		      			<div class="modal-body">
		      				<table style="width: 100%">
		      					<tr>
			                		<td>Tên bộ môn:</td>
			                		<td><input class="form-control" type="text" id="tenbm_edit" name="tenbm_edit" required></td>
			                	</tr>
		       				</table> 			
		      			</div>
		      			<div class="modal-footer">
		      				<input hidden type="text" name="mabmon" id="mabmon">	
		   					<button  type="submit" class="btn btn-primary">Cập nhật</button>
		       				<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
		      			</div>
		    	  	</form>
		    	</div>
		  	</div>
		</div>

<!-- modal thêm bộ môn -->
		<div class="modal" id="insertbomon" role="dialog">
		  	<div class="modal-dialog" role="document">
		   		<div class="modal-content">
		       		<div class="modal-header">
		        		<h5 class="modal-title">Thêm bộ môn </h5>
		      		</div>
		      		<form  action="{{URL::to('insert_bomon')}}" method="POST">
		      		@csrf
		      			<div class="modal-body">
		      				<table style="width: 100%">
		      					<tr>
			                		<td>Mã bộ môn:</td>
			                		<td><input class="form-control" type="text" id="mabm_insert" name="mabm_insert" required></td>
			                	</tr>
		      					<tr>
			                		<td>Tên bộ môn:</td>
			                		<td><input class="form-control" type="text" id="tenbm_insert" name="tenbm_insert" required></td>
			                	</tr>
		       				</table> 			
		      			</div>
		      			<div class="modal-footer">	
		   					<button  type="submit" class="btn btn-primary">Thêm</button>
		       				<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
		      			</div>
		    	  	</form>
		    	</div>
		  	</div>
		</div>

<!-- modal thêm môn học -->
		<div class="modal" id="insertmonhoc" role="dialog">
		  	<div class="modal-dialog" role="document">
		   		<div class="modal-content">
		       		<div class="modal-header">
		        		<h5 class="modal-title">Thêm môn học </h5>
		      		</div>
		      		<form  action="{{URL::to('insert_monhoc')}}" method="POST">
		      		@csrf
		      			<div class="modal-body">
		      				<table style="width: 100%">
		      					<tr>
			                		<td>Mã môn học:</td>
			                		<td><input class="form-control" type="text" id="ma_insert" name="ma_insert" required></td>
			                	</tr>
		      					<tr>
			                		<td>Tên môn học:</td>
			                		<td><input class="form-control" type="text" id="ten_insert" name="ten_insert" required></td>
			                	</tr>
						       	<tr>
					      			<td>Bộ môn: </td>
				     				<td>
			    	   					<select name ="bomon_insert" id="bomon_insert" class="form-control">
											@foreach($bomon as $bm)
												<option value="{{$bm->MaBoMon}}">{{$bm->TenBoMon}}</option>
											@endforeach
										</select>
				       				</td>
			      				</tr>
		       				</table> 			
		      			</div>
		      			<div class="modal-footer">	
		   					<button  type="submit" class="btn btn-primary">Thêm</button>
		       				<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
		      			</div>
		    	  	</form>
		    	</div>
		  	</div>
		</div>


		<script type="text/javascript">

// data table
			$(document).ready(function() 
			{
			    $('#monhoc').DataTable( 
			    {
			        "paging":   false,
			        "info":     false
			    });
			});

// thêm bộ môn
			$('#thembomon').on('click',function()
			{
		  		$.modal = $('#insertbomon');
		   		$.modal.find('form')[0].reset();
		  		$('#insertbomon').modal('show');
		  	});

// cập nhật bộ môn
			$(document).on('click','#suabomon', function()
			{
				$ma = $(this).data('id');
				$mabm = $('#mabm_'+$ma).data('id');
				$tenbm = $('#tenbm_'+$ma).data('id');
				$('#mabmon').val($mabm);
				$('#tenbm_edit').val($tenbm);
				$('#updatebomon').modal('show');  
			});
			
// thêm môn học
			$('#themmonhoc').on('click',function()
			{
		  		$.modal = $('#insertmonhoc');
		   		$.modal.find('form')[0].reset();
		  		$('#insertmonhoc').modal('show');
		  	});

// cập nhật môn học
			$(document).on('click','#suamonhoc', function()
			{
				$ma = $(this).data('id');
				$mamh = $('#ma_'+$ma).data('id');
				$tenmh = $('#ten_'+$ma).data('id');
				$mabm = $('#mabm_'+$ma).data('id');
				$('#mamh').val($mamh);
				$('#ten_edit').val($tenmh);
				$('#bomon_edit').val($mabm);
				$('#updatemonhoc').modal('show');  
			});

		</script>
	</body>
</html>