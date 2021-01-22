<?php
	namespace App\Http\Controllers;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Foundation\Auth\AuthenticatesUsers;
	use Illuminate\Support\Facades\Auth;
	use Session;
	use Exception;
	use PHPExcel; 
	use PHPExcel_IOFactory;
	use App\monhoc;
	use App\mucdocauhoi;
	use App\bomon;
	use App\cauhoi;
	use App\dapan;
	use App\hinhanhda;
	use App\hinhanhch;

class UploadController extends Controller
{
// view upload Câu hỏi
	public function uploadcauhoi()
	{
		try
		{
			$macb = Session::get('username')->MaCanBo;
	        $mabm = new bomon();
	        $mabm = $mabm->get_mabmBymacb($macb);
	        $monhoc = new monhoc();
	       	$monhoc = $monhoc->get_mamhBymabm($mabm);
     		$md = new mucdocauhoi();
     		$mucdo = $md->select();
     		$view2 = 'uploadcauhoi';
            return view('giangvien', compact('monhoc','mucdo','view2'));
        }
        catch(Exception $e)
        {
        	return redirect('login');
        }  
	}

// xử lý upload từng câu
	public function uptungcau(Request $rq)
	{
		try
		{
			$nd_ch = $rq->input('ndcauhoi');
			$mamh = $rq->input('slmonhoc');
			$mamd = $rq->input('slmd');
			$macb = Session::get('username')->MaCanBo;
			$idch = new cauhoi();
			$idch = $idch->insert_getID($macb, $mamh, $nd_ch, $mamd);
			if($rq->hasFile('img_cauhoi'))
			{
				$allowedfileExtension=['jpg','png'];
				$files = $rq->file('img_cauhoi');
				foreach ($files as $file) 
				{
					$extension = $file->getClientOriginalExtension();
					$check=in_array(strtolower($extension),$allowedfileExtension);
					if(!$check) 
					{
	                    Session::flash('error',"Hình ảnh không đúng định dạng!");
	                    return redirect()->back();
					}  
				}
				foreach ($rq->img_cauhoi as $img) 
				{
					$dir_HA = 'img_CH';
					$img->move($dir_HA,$img->getClientOriginalName());
					$path = $dir_HA.'/'.$img->getClientOriginalName();
					$hach = new hinhanhch();
					$hach = $hach->insert($idch, $path);
				}
			}
			$ndda_true = $rq->nddapan_true;
			$idda = new dapan();
			$idda = $idda->insert_getID($idch,$ndda_true,1);

			if($rq->hasFile('img_dapan_true'))
			{
				$allowedfileExtension=['jpg','png'];
				$files = $rq->file('img_dapan_true');
				foreach ($files as $file) 
				{
					$extension = $file->getClientOriginalExtension();
					$check=in_array(strtolower($extension),$allowedfileExtension);
					if(!$check) 
					{
	                    Session::flash('error',"Hình ảnh không đúng định dạng!");
	                    return redirect()->back();
					}
				}
				foreach ($rq->img_dapan_true as $img) 
				{
					$dir_DA = 'img_DA';
					echo $dir_DA;
					$img->move($dir_DA,$img->getClientOriginalName());
					$path = $dir_DA.'/'.$img->getClientOriginalName();
					$hada = new hinhanhda();
					$hada = $hada->insert($idda, $path);
				}
			}
			$sl_da = $rq->sl_da; 
			for($i=1;$i<=$sl_da;$i++)
			{
				$da='nddapan_f'.$i;
				$ndda_f = $rq->$da;
				$idda = new dapan();
				$idda = $idda->insert_getID($idch,$ndda_f,0);

				if($rq->hasFile('img_dapan_f'.$i))
				{
					$allowedfileExtension=['jpg','png'];
					$files = $rq->file('img_dapan_f'.$i);
					foreach ($files as $file) 
					{
						$extension = $file->getClientOriginalExtension();
						$check=in_array(strtolower($extension),$allowedfileExtension);
						if(!$check) 
						{
		                    Session::flash('error',"Hình ảnh không đúng định dạng!");
	                    	return redirect()->back();
						}
					}
					$ha='img_dapan_f'.$i;
					foreach ($rq->$ha as $img) 
					{
						$dir_DA = 'img_DA';
						$img->move($dir_DA,$img->getClientOriginalName());
						$path = $dir_DA.'/'.$img->getClientOriginalName();
						$hada = new hinhanhda();
						$hada = $hada->insert($idda, $path);
					}
				}  
			}  
			Session::flash('success',"Upload câu hỏi thành công!");
        	return redirect()->back();
		}
		catch(Exception $e)
		{
			Session::flash('error',"Upload câu hỏi không thành công!");
       		return redirect()->back();
		}
	}

// xử lý upload file câu hỏi
	public function uploadfile(Request $rq)
  	{
      	try
	    {
	    	if($rq->hasFile('fileupload'))
			{
				$allowedfileExtension=['xls','xlsm','xlsx'];
				$file = $rq->file('fileupload');
				$extension = $file->getClientOriginalExtension();
				$check=in_array(strtolower($extension),$allowedfileExtension);
				if(!$check) 
				{
	                Session::flash('error',"File không đúng định dạng!");
	                return redirect()->back();
				}	
	        	$objPHPExcel = PHPExcel_IOFactory::load($file); // load file ra object PHPExcel
		        $Sheet = $objPHPExcel->setActiveSheetIndex(0); // Set sheet sẽ được đọc dữ liệu
		        $highestRow    = $Sheet->getHighestRow(); // Lấy số row lớn nhất trong sheet
		        $mucdo = $rq->input('slmd');
		        $monhoc = $rq->input('slmonhoc');
		        $macb = Session::get('username')->MaCanBo;
		        $counta = new cauhoi();
		        $counta = $counta->count();
		        for ($row = 2; $row <= $highestRow; $row++) 
		        {
		        	$noidungch = $Sheet->getCellByColumnAndRow(0, $row)->getValue();
		        	$id = new cauhoi();
		      	    $id = $id->insert_getID($macb, $monhoc, $noidungch, $mucdo);
	        		$j=1;
	        		$noidung = $Sheet->getCellByColumnAndRow($j, $row)->getValue();
	        		while($noidung != "")
	      			{
	          			if($j==1)
	         			{
				            $insert_dad = new dapan();
				            $insert_dad = $insert_dad->insert($id, $noidung, 1);
	          			}
	          			else
	          			{
	           				$insert_das = new dapan();
				            $insert_das = $insert_das->insert($id, $noidung, 0);
	          			}
	          			$j++;
	          			$noidung = $Sheet->getCellByColumnAndRow($j, $row)->getValue();
	        		} 
	      		}
		        $countb = new cauhoi();
		        $countb = $countb->count();
		        $count = $countb - $counta;
		        Session::flash('success','Đã thêm thành công '.$count.' dòng!');
		        return redirect()->back();
		    }
   		}
    	catch(Exception $e) 
    	{
      		Session::flash('error','Thêm file không thành công!');
      		return redirect()->back();
    	}
  	}
}
