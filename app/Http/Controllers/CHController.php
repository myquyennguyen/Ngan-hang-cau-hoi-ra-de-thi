<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Session;
use Exception;
use App\monhoc;
use App\bomon;
use App\cauhoi;
use App\dapan;
use App\hinhanhda;
use App\hinhanhch;

class CHController extends Controller
{
// view duyet câu hỏi
    public function duyetcauhoi()
    {
        try
        {
            $macb = Session::get('username')->MaCanBo;
            $mabm = new bomon();
            $mabm = $mabm->get_mabmBymacb($macb);
            $mamh = new monhoc();
            $mamh = $mamh->get_mamhBymacb($macb);
            $cau = new cauhoi();
            $cau = $cau->xem($mamh, 0);
            $mon = new monhoc();
            $mon = $mon->get_mamhBymabm($mabm);
            $view2 = 'duyetcauhoi';
            return view('truongbomon', compact('cau','mon','view2'));
        }
        catch(Exception $e)
        {
            return redirect('login');
        }
	}

// search câu hỏi chưa duyệt
    public function searchdch(Request $request)
    {
        if ($request->ajax()) 
        {
            $output = '';
            $macb = Session::get('username')->MaCanBo;
            $mamh = new monhoc();
            $mamh = $mamh->get_mamhBymacb($macb);
            $cau = new cauhoi();
            $cau = $cau->search($mamh, 0, $request->search);
            if ($cau) {
                $i=1;
                foreach ($cau as $key => $acc) {
                    $output .= '<tr>
                                    <td>'.$i++.'</td>
                                    <td>'.$acc->TenMonHoc.'</td>
                                    <td>'.$acc->MucDo.'</td>
                                    <td>'.$acc->CHNoiDung.'</td>
                                    <td><button id="button"  data-id="'.$acc->IDCauHoi.'" class="btn btn-primary myBtn" ><i class="fa fa-eye" style="color: white;"></i></button></td>
                                </tr>';
                }
            }
            return Response($output);
        }
    }

// view xem câu hỏi
    public function xemcauhoi()
    {
        try
        {
            $macb = Session::get('username')->MaCanBo;
            $mabm = new bomon();
            $mabm = $mabm->get_mabmBymacb($macb);
            $cau = new cauhoi();
            $cau = $cau->xem_Bymacb($macb,1);
            $mon = new monhoc();
            $mon = $mon->get_mamhBymabm($mabm);
            $view2 = 'xemcauhoi';
            return view('giangvien', compact('cau','mon','view2'));
        }
        catch(Exception $e)
        {
            return redirect('login');
        }
    }

// view xem câu hỏi TBM
    public function xemcauhoitbm()
    {
        try
        {
            $macb = Session::get('username')->MaCanBo;
            $mabm = new bomon();
            $mabm = $mabm->get_mabmBymacb($macb);
            $mamh = new monhoc();
            $mamh = $mamh->get_mamhBymacb($macb);
            $cau = new cauhoi();
            $cau = $cau->xem($mamh, 1);
            $mon = new monhoc();
            $mon = $mon->get_mamhBymabm($mabm);
            $view2 = 'xemcauhoi';
            return view('truongbomon', compact('cau','mon','view2'));
        }
        catch(Exception $e)
        {
            return redirect('login');
        }
    }

// search xem câu hỏi giáo viên
	public function searchxch(Request $request)
    {
        if ($request->ajax()) 
        {
            $output = '';
            $macb = Session::get('username')->MaCanBo;
            $cau = new cauhoi();
            $cau = $cau->search_Bymacb(1, $macb, $request->search);
            if ($cau) 
            {
                $i=1;
                foreach ($cau as $key => $acc) 
                {
                    $output .= '<tr>
                                    <td>'.$i++.'</td>
                                    <td>'.$acc->TenMonHoc.'</td>
                                    <td>'.$acc->MucDo.'</td>
                                    <td>'.$acc->CHNoiDung.'</td>
                                    <td><button id="button"  data-id="'.$acc->IDCauHoi.'" class="btn btn-primary myBtn" ><i class="fa fa-eye" style="color: white;"></i></button></td>
                                </tr>';
                }
            }
            return Response($output);
        }
    }

// search xem câu hỏi TBM
    public function searchxchTBM(Request $request)
    {
        if ($request->ajax()) 
        {
            $output = '';
            $macb = Session::get('username')->MaCanBo;
            $mamh = new monhoc();
            $mamh = $mamh->get_mamhBymacb($macb);
            $cau = new cauhoi();
            $cau = $cau->search($mamh, 1, $request->search);
            if ($cau) {
                $i=1;
                foreach ($cau as $key => $acc) {
                    $output .= '<tr>
                                    <td>'.$i++.'</td>
                                    <td>'.$acc->TenMonHoc.'</td>
                                    <td>'.$acc->MucDo.'</td>
                                    <td>'.$acc->CHNoiDung.'</td>
                                    <td><button id="button"  data-id="'.$acc->IDCauHoi.'" class="btn btn-primary myBtn" ><i class="fa fa-eye" style="color: white;"></i></button></td>
                                </tr>';
                }
            }
            return Response($output);
        }
    }

// xử lý xem câu hỏi đã duyệt
    public function xemxch(Request $request)
    {
       if ($request->ajax()) 
       {
            $output = '';
            $cauhoi = new cauhoi();
            $cauhoi = $cauhoi->get_ByID($request->search);
            $dapan = new dapan();
            $dapan = $dapan->get_ByidCH_order($request->search);
            if ($cauhoi) 
            {
                foreach ($cauhoi as $key => $ch) 
                {
                    $output .= 
                        '<label><b>Câu hỏi</b></label><br>
                        <textarea class="alert alert-info" style=" width: 100%; height: auto; border:2px solid blue">'.$ch->CHNoiDung.'</textarea>';
                    $hinhanhch = new hinhanhch();
                    $hinhanhch = $hinhanhch->get_hinhanhch($request->search);
                    
                    if($hinhanhch)
                    {
                        foreach ($hinhanhch as $key => $hinhanh) 
                        {
                           $output .= '<img src="'.$hinhanh->Vitri.'" style="width: 45%; height: auto; margin:5px"></img>';
                        }
                    }
                }

                $index = array('A','B','C','D','E','F','G' );
                $i=0;
                foreach ($dapan as $key => $da) 
                {
                    $hinhanhda = new hinhanhda();
                    $hinhanhda = $hinhanhda->get_hinhanhda($da->IDDapAn);         
                    if($da->TrangThai) 
                    {
                        $output .= '<br><br><label><b>Đáp án</b></label>
                        &nbsp;<textarea class="alert alert-success" style="width: 100%; height: auto; border:1px solid green;">'.$index[$i].': '.$da->NoiDung.'</textarea>';
                        if($hinhanhda)
                        {
                            foreach ($hinhanhda as $key => $hinhanh) 
                            {
                                $output .= '<img src="'.$hinhanh->Vitri.'" style="width: 45%; height: auto; margin:5px"></img>';
                            }
                        }
                    }
                    else 
                    {
                       $output .= '
                        &nbsp;<textarea class="alert alert-danger" style="width: 100%; height: auto; border:1px solid red;">'.$index[$i].': '.$da->NoiDung.'</textarea>';
                        if($hinhanhda)
                        {
                            foreach ($hinhanhda as $key => $hinhanh) 
                            {
                                $output .= '<img src="'.$hinhanh->Vitri.'" style="width: 45%; height: auto; margin:5px"></img>';
                            }
                        }      
                    }
                    $i++;
                }
            }
            return Response($output);
        }
    }

// xử lý xem câu hỏi chưa duyệt
    public function xemdch(Request $request)
    {
       if ($request->ajax()) 
       {
            $output = '';
            $cauhoi = new cauhoi();
            $cauhoi = $cauhoi->get_ByID($request->search);
            $dapan = new dapan();
            $dapan = $dapan->get_ByidCH_order($request->search);
            if ($cauhoi) 
            {
                foreach ($cauhoi as $key => $ch) 
                {
                    $output .= 
                        '<label><b>Câu hỏi</b></label><br>
                        <textarea class="alert alert-info" style="width: 100%; height: auto; border:2px solid blue;">'.$ch->CHNoiDung.'</textarea>
                        <input type="text" id="idch" name="idch" value='.$request->search.' hidden>';
                    $hinhanhch = new hinhanhch();
                    $hinhanhch = $hinhanhch->get_hinhanhch($request->search);
                    
                    if($hinhanhch)
                    {
                        foreach ($hinhanhch as $key => $hinhanh) 
                        {
                           $output .= '<img src="'.$hinhanh->Vitri.'" style="width: 45%; height: auto; margin:5px"></img>';
                        }
                    }
                }

                $index = array('A','B','C','D','E','F','G' );
                $i=0;
                foreach ($dapan as $key => $da) 
                {
                    $hinhanhda = new hinhanhda();
                    $hinhanhda = $hinhanhda->get_hinhanhda($da->IDDapAn);             
                    if($da->TrangThai) 
                    {
                        $output .= '<br><br><label><b>Đáp án</b></label>
                        &nbsp;<textarea class="alert alert-success" style="width: 100%; height: auto; border:1px solid green;">'.$index[$i].': '.$da->NoiDung.'</textarea>';
                        if($hinhanhda)
                        {
                            foreach ($hinhanhda as $key => $hinhanh) 
                            {
                                $output .= '<img src="'.$hinhanh->Vitri.'" style="width: 45%; height: auto; margin:5px"></img>';
                            }
                        }
                    }
                    else 
                    {
                       $output .= '
                        &nbsp;<textarea class="alert alert-danger" style="width: 100%; height: auto">'.$index[$i].': '.$da->NoiDung.'</textarea>';
                        if($hinhanhda)
                        {
                            foreach ($hinhanhda as $key => $hinhanh) 
                            {
                                $output .= '<img src="'.$hinhanh->Vitri.'" style="width: 45%; height: auto; margin:5px"></img>';
                            }
                        }      
                    }
                    $i++;
                }
                $output .= '<br><br><div style="width: 100%; text-align: center;">
                            <button type="submit" id="duyet" class="btn btn-success">Duyệt</button>
                            <a " id="xoa" class=" btn btn-danger">Xóa</a>
                            <div>';
            }
            return Response($output);
        }
    }

// xử lý duyệt câu hỏi
    public function duyetch(Request $rq)
    {
        try
        {
            $ma = $rq->input('idch');
            $duyet = new cauhoi();
            $duyet = $duyet->duyet($ma); 
            Session::flash('success',"Duyệt câu hỏi thành công!");
            return redirect()->back();
        }
        catch(Exception $e)
        {
            Session::flash('error',"Duyệt câu hỏi không thành công!");
            return redirect()->back();
        }
    }

//xử lý xóa câu hỏi 
    public function xoach(Request $rq)
    {
        try
        {
            $ma = $rq->input('stt');
            $mada = new dapan();
            $mada = $mada->pluck_ByidCH($ma);
            $dlt_hada = new hinhanhda();
            $dlt_hada = $dlt_hada->deletehada($mada);

            $dlt_da = new dapan();
            $dlt_da = $dlt_da->deleteda($ma);

            $dlt_hach = new hinhanhch();
            $dlt_hach = $dlt_hach->deletehach($ma);

            $dlt_ch = new cauhoi();
            $dlt_ch = $dlt_ch->deletech($ma);
 
            Session::flash('success',"Xóa câu hỏi thành công!");
            return redirect()->back();
        }
        catch(Exception $e)
        {
            Session::flash('error',"Xóa câu hỏi không thành công!");
            return redirect()->back();
        }
    }
}
