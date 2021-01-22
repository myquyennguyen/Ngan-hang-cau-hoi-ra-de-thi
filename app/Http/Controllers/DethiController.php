<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\monhoc;
use App\bomon;
use App\cauhoi;
use App\dethi;
use App\chitietdt;
use App\hinhanhch;
use App\hinhanhda;
use App\dapan;
use App\bailam;
use App\cauhoi_bailam;
use App\dapan_bailam;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Validator;
use Session;
use Exception;

class DethiController extends Controller

{

//view tạo đề thi giáo viên
    public function taodethi()
    {
        $macb = Session::get('username')->MaCanBo;
        $mabm = new bomon();
        $mabm = $mabm->get_mabmBymacb($macb);
        $monhoc = new monhoc();
        $monhoc = $monhoc->get_mamhBymabm($mabm);
        $view2 = 'taodethi';
        return view('giangvien',compact('monhoc','view2'));     
    }
    
//view tạo đề thi TBM
    public function taodethitbm()
    {
        $macb = Session::get('username')->MaCanBo;
        $mabm = new bomon();
        $mabm = $mabm->get_mabmBymacb($macb);
        $monhoc = new monhoc();
        $monhoc = $monhoc->get_mamhBymabm($mabm);
        $view2 = 'taodethi';
        return view('truongbomon',compact('monhoc','view2'));     
    }
    
//view xem đề thi giáo viên
    public function xemdethi()
    {
        $macb = Session::get('username')->MaCanBo;
        $mabm = new bomon();
        $mabm = $mabm->get_mabmBymacb($macb);
        $made = new dethi();
        $made = $made->get_madeBymacb($macb);
        $monhoc = new monhoc();
        $monhoc = $monhoc->get_mamhBymabm($mabm);
        $view2 = 'xemdethi';
        return view('giangvien',compact('made','monhoc','view2'));
    }

//view xem đề thi TBM
    public function xemdethitbm()
    {
        $macb = Session::get('username')->MaCanBo;
        $mabm = new bomon();
        $mabm = $mabm->get_mabmBymacb($macb);
        $mamh = new monhoc();
        $mamh = $mamh->get_mamhBymacb($macb);
        $made = new dethi();
        $made = $made->get_madeBymamh($mamh);
        $monhoc = new monhoc();
        $monhoc = $monhoc->get_mamhBymabm($mabm);
        $view2 = 'xemdethi';
        return view('truongbomon',compact('made','monhoc','view2'));
    }

//tạo đề thi TBM -giáo viên
    public function xuly_taodethitbm(Request $rq)
    {
        try
        {   
            $monhoc = $rq->input('slmonhoc');
            $tieude = $rq->input('tieude');
            $thoigian = $rq->input('thoigian');
            $nhanbiet = $rq->input('nhanbiet');
            $thonghieu = $rq->input('thonghieu');
            $vandung = $rq->input('vandung');
            $vandungcao = $rq->input('vandungcao');
            $sl = $nhanbiet + $thonghieu + $vandung + $vandungcao;
            $date = Carbon::now('Asia/Ho_Chi_Minh');
            $macb = Session::get('username')->MaCanBo;
       
            if($sl == 0)
            {
                Session::flash('success','Không có câu hỏi!');
                return redirect()->back();
            }

            $cnt_nb = new cauhoi();
            $cnt_nb = $cnt_nb->count_cauhoi('NB',$monhoc);
            $cnt_th = new cauhoi();
            $cnt_th = $cnt_th->count_cauhoi('TH',$monhoc);
            $cnt_vd = new cauhoi();
            $cnt_vd = $cnt_vd->count_cauhoi('VD',$monhoc);
            $cnt_vdc = new cauhoi();
            $cnt_vdc = $cnt_vdc->count_cauhoi('VDC',$monhoc);

            if($nhanbiet > $cnt_nb || $thonghieu > $cnt_th || $vandung >$cnt_vd || $vandungcao > $cnt_vdc)
            {
                Session::flash('error','Không đủ câu hỏi để tạo đề thi!');
                return redirect()->back();
            }

            $chnhanbiet = new cauhoi();
            $chnhanbiet = $chnhanbiet->get_cauhoi('NB',$monhoc, $nhanbiet);
            
            $chthonghieu = new cauhoi();
            $chthonghieu = $chthonghieu->get_cauhoi('TH',$monhoc, $thonghieu);
           
            $chvandung = new cauhoi();
            $chvandung = $chvandung->get_cauhoi('VD',$monhoc, $vandung);
            
            $chvandungcao = new cauhoi();
            $chvandungcao = $chvandungcao->get_cauhoi('VDC',$monhoc, $vandungcao);

           

            $id = new dethi();
            $id = $id->insert_getID($macb, $monhoc, $tieude, $date->toDateString(), $sl, $thoigian);

            foreach ($chnhanbiet as $key => $nb) 
            {
                $insert = new chitietdt();
                $insert = $insert->insert($id, $nb->IDCauHoi);
                $update_count = new cauhoi();
                $update_count = $update_count->updatech($nb->IDCauHoi, $nb->Count +1);
            }

            foreach ($chthonghieu as $key => $th) 
            {
                $insert = new chitietdt();
                $insert = $insert->insert($id, $th->IDCauHoi);
                $update_count = new cauhoi();
                $update_count = $update_count->updatech($th->IDCauHoi, $tht->Count +1);
            }

            foreach ($chvandung as $key => $vd) 
            {
                $insert = new chitietdt();
                $insert = $insert->insert($id, $vd->IDCauHoi);
                $update_count = new cauhoi();
                $update_count = $update_count->updatech($vd->IDCauHoi, $vd->Count +1);
            }

            foreach ($chvandungcao as $key => $vdc) 
            {
                $insert = new chitietdt();
                $insert = $insert->insert($id, $vdc->IDCauHoi);
                $update_count = new cauhoi();
                $update_count = $update_count->updatech($vdc->IDCauHoi, $vdc->Count +1);
            }
            Session::flash('success','Tạo đề thi thành công!');
            return redirect()->back();
        }
        catch(Exception $e)
        {
            Session::flash('error','Tạo đề thi không thành công!');
            return redirect()->back();
        }
       
    }

//xử lý tạo đề thi
    public function xuly_taodethi(Request $rq)
    {
        try 
        {
            $monhoc = $rq->input('slmonhoc');
            $tieude = $rq->input('tieude');
            $thoigian = $rq->input('thoigian');
            $nhanbiet = $rq->input('nhanbiet');
            $thonghieu = $rq->input('thonghieu');
            $vandung = $rq->input('vandung');
            $vandungcao = $rq->input('vandungcao');
            $sl = $nhanbiet + $thonghieu + $vandung + $vandungcao;
            $date = Carbon::now('Asia/Ho_Chi_Minh');
            $macb = Session::get('username')->MaCanBo;
       
            $cnt_nb = new cauhoi();
            $cnt_nb = $cnt_nb->count_cauhoicb('NB',$monhoc, $macb);
            $cnt_th = new cauhoi();
            $cnt_th = $cnt_th->count_cauhoicb('TH',$monhoc, $macb);
            $cnt_vd = new cauhoi();
            $cnt_vd = $cnt_vd->count_cauhoicb('VD',$monhoc, $macb);
            $cnt_vdc = new cauhoi();
            $cnt_vdc = $cnt_vdc->count_cauhoicb('VDC',$monhoc, $macb);


            if($nhanbiet > $cnt_nb || $thonghieu > $cnt_th || $vandung >$cnt_vd || $vandungcao > $cnt_vdc)
            {
                Session::flash('error','Không đủ câu hỏi để tạo đề thi!');
                return redirect()->back();
            }

            $chnhanbiet = new cauhoi();
            $chnhanbiet = $chnhanbiet->get_cauhoicb('NB',$monhoc, $macb, $nhanbiet);
            
            $chthonghieu = new cauhoi();
            $chthonghieu = $chthonghieu->get_cauhoicb('TH',$monhoc, $macb, $thonghieu);
           
            $chvandung = new cauhoi();
            $chvandung = $chvandung->get_cauhoicb('VD',$monhoc, $macb, $vandung);
            
            $chvandungcao = new cauhoi();
            $chvandungcao = $chvandungcao->get_cauhoicb('VDC',$monhoc, $macb, $vandungcao);
           

            $id = new dethi();
            $id = $id->insert_getID($macb, $monhoc, $tieude, $date->toDateString(), $sl, $thoigian);


            foreach ($chnhanbiet as $key => $nb) 
            {
                $insert = new chitietdt();
                $insert = $insert->insert($id, $nb->IDCauHoi);
                $update_count = new cauhoi();
                $update_count = $update_count->updatech($nb->IDCauHoi, $nb->Count);
            }

            foreach ($chthonghieu as $key => $th) 
            {
                $insert = new chitietdt();
                $insert = $insert->insert($id, $th->IDCauHoi);
                $update_count = new cauhoi();
                $update_count = $update_count->updatech($th->IDCauHoi, $th->Count);
            }

            foreach ($chvandung as $key => $vd) 
            {
                $insert = new chitietdt();
                $insert = $insert->insert($id, $vd->IDCauHoi);
                $update_count = new cauhoi();
                $update_count = $update_count->updatech($vd->IDCauHoi, $vd->Count);
            }

            foreach ($chvandungcao as $key => $vdc) 
            {
                $insert = new chitietdt();
                $insert = $insert->insert($id, $vdc->IDCauHoi);
                $update_count = new cauhoi();
                $update_count = $update_count->updatech($vdc->IDCauHoi, $vdc->Count);
            }
            Session::flash('success','Tạo đề thi thành công!');
            return redirect()->back();
        }
        catch(Exception $e)
        {
            Session::flash('error','Tạo đề thi không thành công!');
            return redirect()->back();
        }
    }

//xem đề thi ajax
    public function xemnoidungde(Request $request)
    {
        if ($request->ajax()) 
        {
            $output = '';
            $dethi = new chitietdt();
            $dethi = $dethi->get_chitiet($request->search);

            if ($dethi) 
            {
                $i=1;
                foreach ($dethi as $key => $dt) 
                {
                    $output .= '<b>Câu '.$i++.': '.htmlspecialchars($dt->CHNoiDung).'</b><br>';
                    $index = array('A','B','C','D','E','F','G' );
                    $j=0;
                    $hinhanhch = new hinhanhch();
                    $hinhanhch = $hinhanhch->get_hinhanhch($dt->IDCauHoi);
                    if($hinhanhch)
                    {
                        foreach ($hinhanhch as $key => $hinhanh) 
                        {
                        $output .= '<img src="'.$hinhanh->Vitri.'" style="width: 45%; height: auto; margin: 5px"></img>';
                        }
                        $output .='<br>';
                    }
                    $dapan = new dapan();
                    $dapan = $dapan->get_dapan($dt->IDCauHoi);      
                    foreach ($dapan as $key => $da) 
                    {
                        $hinhanhda = new hinhanhda();
                        $hinhanhda = $hinhanhda->get_hinhanhda($da->IDDapAn);
                        if($da->TrangThai)
                        {
                            $output .= '<u>'.$index[$j++].': '.htmlspecialchars($da->NoiDung).'</u><br>';
                            if($hinhanhda)
                            {
                                foreach ($hinhanhda as $key => $hinhanh) 
                                {
                                    $output .= '<img src="'.$hinhanh->Vitri.'" style="width: 45%; height: auto; margin:5px"></img>';
                                }
                                $output .='<br>';
                            }
                        }
                        else 
                        {
                            $output .= $index[$j++].': '.htmlspecialchars($da->NoiDung).'<br>';
                            if($hinhanhda)
                            {
                                foreach ($hinhanhda as $key => $hinhanh) 
                                {
                                    $output .= '<img src="'.$hinhanh->Vitri.'" style="width: 45%; height: auto; margin:5px"></img>';
                                }
                                $output .='<br>';
                            }
                        }
                    }
                }
                  
            }
            return Response($output);
        }
    }

//search đề thi giáo viên
    public function searchdethi(Request $request)
    {
        if ($request->ajax()) 
        {
            $output = '';
            $macb = Session::get('username')->MaCanBo;
            $dethi = new dethi();
            $dethi = $dethi->get_IDdecb($macb, $request->search);
            if ($dethi) 
            {
                $i=1;
                foreach ($dethi as $key => $dt) 
                {
                    $output .= '<tr>
                                    <td>'.$i++.'</td>
                                    <td>'.$dt->TieuDe.'</td>
                                    <td>'.$dt->NgayTao.'</td>
                                    <td>'.$dt->MaMonHoc.'</td>
                                    <td><button id="xem"  data-id="'.$dt->IDDeThi.'" class="btn btn-info" ><i class="fa fa-eye" style="color: white;"></i></button></td>
                                    <td><button id="xuat"  data-id="'.$dt->IDDeThi.'" class="btn btn-success" ><i class="fa fa-download" style="color: white;"></i></button></td>';
                                    
                    if($dt->Test == 1)
                    {

                        $output .= '<td><button disabled  id="thithu"  data-id="'.$dt->IDDeThi.'" class="btn btn-primary" ><i class="fa fa-check" style="color: white;"></i></button></td>'; 
                    }
                    else
                    {
                        $output .= '<td><button id="thithu"  data-id="'.$dt->IDDeThi.'" class="btn btn-primary" ><i class="fa fa-check" style="color: white;"></i></button></td>';
                    }

                    $output .='<td><button id="xoadeonl"  data-id="'.$dt->IDDeThi.'" class="btn btn-danger" ><i class="fa fa-trash" style="color: white;"></i></button></td>
                                <td><button id="xemkqt"  data-id="'.$dt->IDDeThi.'" class="btn btn-info" ><i class="fa fa-eye" style="color: white;"></i></button></td></tr>';
                }
            }
            return Response($output);
        }
    }

//search đề thi TBM
    public function searchdethitbm(Request $request)
    {
        if ($request->ajax()) 
        {
            $output = '';
            $dethi = new dethi();
            $dethi = $dethi->get_IDde($request->search);            
            if ($dethi) 
            {
                $i=1;
                foreach ($dethi as $key => $dt) 
                {
                    $output .= '<tr>
                                    <td>'.$i++.'</td>
                                    <td>'.$dt->TieuDe.'</td>
                                    <td>'.$dt->NgayTao.'</td>
                                    <td>'.$dt->MaMonHoc.'</td>
                                    <td><button id="xem"  data-id="'.$dt->IDDeThi.'" class="btn btn-info" ><i class="fa fa-eye" style="color: white;"></i></button></td>
                                    <td><button id="xuat"  data-id="'.$dt->IDDeThi.'" class="btn btn-success" ><i class="fa fa-download" style="color: white;"></i></button></td>';
                    if($dt->Test == 1)
                    {
                        $output .= '<td><button disabled  id="thithu"  data-id="'.$dt->IDDeThi.'" class="btn btn-primary" ><i class="fa fa-check" style="color: white;"></i></button></td>'; 
                    }
                    else
                    {
                        $output .= '<td><button id="thithu"  data-id="'.$dt->IDDeThi.'" class="btn btn-primary" ><i class="fa fa-check" style="color: white;"></i></button></td>';
                    }

                    $output .='<td><button id="xoadeonl"  data-id="'.$dt->IDDeThi.'" class="btn btn-danger" ><i class="fa fa-trash" style="color: white;"></i></button></td>
                                <td><button id="xemkqt"  data-id="'.$dt->IDDeThi.'" class="btn btn-info" ><i class="fa fa-eye" style="color: white;"></i></button></td></tr>';
                }
            }
            return Response($output);
        }
    }

//view thi thử
    public function thi()
    {
        $made = new dethi();
        $made = $made->get_dethithu();
        $mon = new monhoc();
        $mon = $mon->select();
        $view_thi = 'thi';
        return view('kiemtra',compact('made','mon','view_thi'));
    }

//search đề thi thử
    public function searchdethithu(Request $request)
    {
        if ($request->ajax()) 
        {
            $output = '';
            $dethi = new dethi();
            $dethi = $dethi->get_IDthithu($request->search);
            if ($dethi) 
            {
                $i=1;
                foreach ($dethi as $key => $dt) 
                {
                    $output .= '<tr>
                                    <td>'.$i++.'</td>
                                    <td>'.$dt->TieuDe.'</td>
                                    <td><button id="thi"  data-id="'.$dt->IDDeThi.'" class="btn btn-primary" >Thi thử</button></td>
                                </tr>';
                }
            }
            return Response($output);
        }
    }

//nội dung đề thi online
    public function noidungdethithu($id, $idbailam)
    {

        $output = '';
        $chitiet = new chitietdt();
        $dethi = $chitiet->get_random($id);
        $slch = $chitiet->count_chitiet($id);
        if ($dethi) 
        {
            $i=1;
            $output .='<input hidden="true" type="text" id="idde" name="idde" value='.$id.'>';
            $thutucauhoi_dapan = array();
            foreach ($dethi as $key => $dt) 
            {
                $key = $dt->IDDeThi;
                $idchbl = new cauhoi_bailam();
                $idchbl = $idchbl->insert_getID($idbailam,$dt->IDCauHoi);
                $output .= '<div style:"color: black;" class="alert alert-success" >';
                $output .= '<b>Câu '.$i.': '.htmlspecialchars($dt->CHNoiDung).'</b><br>';
                $index = array('A','B','C','D','E','F','G' );
                $j=0;
                $hinhanhch = new hinhanhch();
                $hinhanhch = $hinhanhch->get_hinhanhch($dt->IDCauHoi);
                if($hinhanhch)
                {
                    foreach ($hinhanhch as $key => $hinhanh) 
                    {

                        $output .= '<img src="'.$hinhanh->Vitri.'" style="width: 45%; height: auto; margin: 5px"></img>';
                    }
                    $output .='<br>';
                }
                $dapan = new dapan();
                $dapan = $dapan->get_ByidCH($dt->IDCauHoi);  
                foreach ($dapan as $key => $da) 
                {

                    $value = $da->IDDapAn;
                    $iddabl = new dapan_bailam();
                    $iddabl = $iddabl->insert_getID($idchbl, $value,0);
                    $thutucauhoi_dapan['$key'] = $value;
                    $hinhanhda = new hinhanhda();
                    $hinhanhda = $hinhanhda->get_hinhanhda($da->IDDapAn);
                    if($dapan[0])
                    {
                        $output .= '<input class="cauhoi" type="radio" name="cau'.$i.'" value='.$da->IDDapAn.' required>&nbsp;'. $index[$j++].': '.htmlspecialchars($da->NoiDung).'<br>';
                    }
                    else
                    {
                        $output .= '<input class="cauhoi" type="radio" name="cau'.$i.'" value='.$da->IDDapAn.'>&nbsp;'. $index[$j++].': '.htmlspecialchars($da->NoiDung).'<br>';
                    }
                    if($hinhanhda)
                    {
                        foreach ($hinhanhda as $key => $hinhanh) 
                        {
                            $output .= '<img src="'.$hinhanh->Vitri.'" style="width: 45%; height: auto; margin:5px"></img>';
                        }
                        $output .='<br>';
                    }
                }
                $output .= "</div>";
                $i++;   
            }
             $output .='<input hidden="true" id="slch" type="textarea" name="slch" value="'.$slch.'">';
        }
    }  

//xuất bài làm
    public function xuatbailam($id)
    {
        $output = '';
        $cauhoibl = new cauhoi_bailam();
        $dethi = $cauhoibl->layNoiDungCauHoi($id);
        $slch = $cauhoibl->soLuongCauHoi($id);
        if ($dethi) 
        {
            $i=1;
            $output.='<input hidden="true" type="text" id="idbailam" name="idbailam" value='.$id.'>';
            foreach ($dethi as $key => $dt) 
            {
                
                $output .= '<div style:"color: black;" class="alert alert-success" >';
                $output .= '<b>Câu '.$i.': '.htmlspecialchars($dt->CHNoiDung).'</b><br>';
                $index = array('A','B','C','D','E','F','G' );
                $j=0;
                $hinhanhch = new hinhanhch();
                $hinhanhch = $hinhanhch->get_hinhanhch($dt->IDCauHoi);
                if($hinhanhch)
                {
                    foreach ($hinhanhch as $key => $hinhanh) 
                    {

                        $output .= '<img src="'.$hinhanh->Vitri.'" style="width: 45%; height: auto; margin: 5px"></img>';
                    }
                    $output .='<br>';
                }
                $dapan = new dapan_bailam();
                $dapan = $dapan->layNoiDungDapAn($dt->ID);
                foreach ($dapan as $key => $da) 
                {

                    $value = $da->IDDapAn;
                    $hinhanhda = new hinhanhda();
                    $hinhanhda = $hinhanhda->get_hinhanhda($da->IDDapAn);
                    if($da->TrangThai == 1)
                    {
                        $output .= '<input checked class="cauhoi" type="radio" name="cau'.$i.'" value='.$da->IDDapAn.' required>&nbsp;'. $index[$j++].': '.htmlspecialchars($da->NoiDung).'<br>';
                        $output .= "
                            <script>
                            $('#cau'+$i).css('border','3px solid blue');
                            $('#cau'+$i).css('background-color','rgb(153,180,250)');
                            </script>";
                    }
                    else
                    {
                        $output .= '<input class="cauhoi" type="radio" name="cau'.$i.'" value='.$da->IDDapAn.'>&nbsp;'. $index[$j++].': '.htmlspecialchars($da->NoiDung).'<br>';
                    }
                    if($hinhanhda)
                    {
                        foreach ($hinhanhda as $key => $hinhanh) 
                        {
                            $output .= '<img src="'.$hinhanh->Vitri.'" style="width: 45%; height: auto; margin:5px"></img>';
                        }
                        $output .='<br>';
                    }
                }
                $output .= "</div>";
                $i++;   
            }
             $output .='<input hidden="true" id="slch" type="textarea" name="slch" value="'.$slch.'">';
        }
        $view_thi="lambaithi";
        return view('kiemtra', compact('output', 'slch','view_thi','id'));
    }


//lưu đáp án nhưng không nộp bài
    public function luudapan(Request $request)
    {
        $idbailam = $request->input('idbailam');
        $slch = $request->input('slch');        
        for($i=1;$i<=$slch;$i++)
        {
            $idda = $request->input('cau'.$i);
            $da_bl = new dapan_bailam();
            $ch_da = $da_bl->layCauHoi_DapAn($idbailam,$idda);
                
            foreach ($ch_da as $key => $ch) 
            {
                $da_bl->luuDapAn($idda, $ch->ID);
            }
        }
    }

//nộp bài thi
    public function nopbai(Request $request)
    {
        $slch = $request->slch;
        $idbailam = $request->idbailam;
        $diem=0;
        $this->luudapan($request);
        for($i=1;$i<=$slch;$i++)
        {
            $idda = $request->input('cau'.$i);
            $tt = new dapan();
            $tt = $tt->get_trangthai($idda);

            if(count($tt) > 0)
                if($tt[0] == 1)
                    $diem++;
        }
        $bl = new bailam();
        $bl->hoanThanhBaiLam($idbailam, $diem);
        $view_thi='ketqua';
        return view('kiemtra',compact('slch','diem','view_thi'));
    }

//kiểm tra mật khẩu
    public function kiemtramatkhau(Request $rq)
    {
        $password_check = $rq->checkpass;
        $made = $rq->madethi;
        $dt =  new dethi();
        $password = $dt->getPassword($made);
        $slch = $dt->getSoLuongCauHoi($made);
        $name = Session::get('usernamesv');
        $bl =  new bailam();
        $tt = $bl->getTrangThai($name, $made);
        if($bl->checkUser($name, $made))
        {
            if($tt->TrangThai == 1)
            {
                $diem = $tt->SoCauDung;
                $view_thi='ketqua';
                return view('kiemtra',compact('slch','diem','view_thi'));
            }
            else
            {
                if($password_check == $password[0])
                {
                    $idbailam = $tt->IDBaiLam;
                    return $this->xuatbailam($idbailam);
                }
                else
                {
                    Session::flash('error',"Mật khẩu sai!");
                    return redirect()->back();
                }
            } 
        }
        else
        {
            if($password_check == $password[0])
            {
                $idbailam = new bailam();
                $idbailam = $idbailam->insertBaiLam($made, $name);
                $this->noidungdethithu($made,$idbailam);
                return $this->xuatbailam($idbailam);
                
            }
            else
            {
                Session::flash('error',"Mật khẩu sai!");
               return redirect()->back();
            }
        }
    }
    
//xem kết quả thi
    public function xemketquathi(Request $request)
    {
        $idde = $request->idde;
        $slch = new dethi();
        $bl = new bailam();
        $result = $bl->xemKetQuaThi($idde);
        $slch = $slch->getSoLuongCauHoi($idde);
        $output = '';
        foreach ($result as $key => $sv) 
        {
            $diem=($sv->SoCauDung)*100/$slch;
            $diem=number_format((float)$diem, 3, '.', '');
            $output .= '<tr><td>'.$sv->MaSinhVien.'</td><td>'.$sv->TenSinhVien.'</td><td>'.$diem.'</td></tr>';
        }
        return Response($output);
    }

// xuất đề thi online
    public function xuatthithu(Request $rq)
    {
        try
        {
            $made = $rq->madethi;
            $password = $rq->pass;
            $dt = new dethi();
            $dt->updateTest($made,$password);
            Session::flash('success',"Xuất đề thành công");
            return redirect()->back();
        }
        catch(Exception $e)
        {
            Session::flash('error',"Xuất đề không thành công!");
            return redirect()->back();
        }
    }

//xóa đề thi online
    public function xoadeonl(Request $request)
    {
        try
        {
            $idde = $request->idde;
            $dt = new dethi();
            $dt->deleteTest($idde);
            Session::flash('success',"Xóa đề online thành công");
            return redirect()->back();
        }
        catch(Exception $e)
        {
            Session::flash('error',"Xóa đề online không thành công!");
            return redirect()->back();
        }
    }

//xóa đề thi gốc
    // public function xoadegoc(Request $request)
    // {
    //     $idde = $request->idde;
    //     try
    //     {
    //         $idde = $request->idde;
    //         $dt = new dethi();
    //         $result=$dt->deleteDeThi($idde);
    //         Session::flash('success',"Xóa đề gốc thành công");
    //         return redirect()->back();
    //     }
    //     catch(Exception $e)
    //     {
    //         Session::flash('error',"Xóa đề gốc không thành công!");
    //         return redirect()->back();
    //     }
    // }
}
