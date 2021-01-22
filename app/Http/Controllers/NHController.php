<?php

namespace App\Http\Controllers;
use App\bomon;
use App\monhoc;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Exception;

class NHController extends Controller
{
// view cập nhật bộ môn
    public function cnbomon()
    {
		$bm = new bomon();
		$mh = new monhoc();
		$bomon = $bm->select();
		$monhoc = $mh->select();
		$view2 = 'cnbomon';
    	return view('admin', compact('bomon','monhoc','view2'));        
	}

// xử lý cập nhật môn học
	public function update_monhoc(Request $rq)
	{
		try
		{
			$mamon = $rq->input('mamh');
			$tenmon = $rq->input('ten_edit');
			$bomon = $rq->input('bomon_edit');
			$update_mh = new monhoc();
			$update_mh = $update_mh->update_Bymamh($mamon, $tenmon, $bomon);
		    Session::flash('success',"Cập nhật môn học thành công!");
            return redirect()->back();
        }
        catch(Exception $e)
        {
            Session::flash('error',"Cập nhật môn học không thành công!");
            return redirect()->back();
        }
	}

// xử lý thêm môn học
	public function insert_monhoc(Request $rq)
	{
		try
		{
			$mamon = $rq->input('ma_insert');
			$tenmon = $rq->input('ten_insert');
			$bomon = $rq->input('bomon_insert');
			$insert_mh = new monhoc();
			$insert_mh = $insert_mh->insert($mamon, $tenmon, $bomon);
		    Session::flash('success',"Thêm môn học thành công!");
            return redirect()->back();
        }
        catch(Exception $e)
        {
            Session::flash('error',"Thêm môn học không thành công!");
            return redirect()->back();
        }
	}

// xử lý cập nhật bộ môn
	public function update_bomon(Request $rq)
	{
		try
		{
			$mabomon = $rq->input('mabmon');
			$tenbomon = $rq->input('tenbm_edit');
			$update_bm = new bomon();
			$update_bm = $update_bm->update_Bymabm($mabomon, $tenbomon);
		    Session::flash('success',"Cập nhật bộ môn thành công!");
            return redirect()->back();
        }
        catch(Exception $e)
        {
            Session::flash('error',"Cập nhật bộ môn không thành công!");
            return redirect()->back();
        }
	}

// xử lý thêm bộ môn
	public function insert_bomon(Request $rq)
	{
		try
		{
			$mabmon = $rq->input('mabm_insert');
			$tenbmon = $rq->input('tenbm_insert');
			$insert_bm = new bomon();
			$insert_bm = $insert_bm->insert($tenbmon, $mabmon);
		    Session::flash('success',"Thêm bộ môn thành công!");
            return redirect()->back();
        }
        catch(Exception $e)
        {
            Session::flash('error',"Thêm bộ môn không thành công!");
            return redirect()->back();
        }
	}
}
