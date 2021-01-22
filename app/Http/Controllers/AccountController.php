<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Session;
use Exception;
use ErrorException;
use Illuminate\Http\Request;
use App\taikhoansv;
use App\taikhoan;
use App\sinhvien;
use App\canbo;
use App\phanquyen;

class AccountController extends Controller
{
	public function cntaikhoan()
    {
// view cập nhật tài khoản
		$accinf = new taikhoan();
        $accinf = $accinf->get_join_canbo_phanquyen();
        $ma = new taikhoan();
        $ma = $ma->pluck_macb();
        $masv = new taikhoansv();
        $masv = $masv->pluck_masv();
        $user = new canbo();
        $user = $user->get_Bymacb($ma);
        $sv = new sinhvien();
        $sv = $sv->get_Bymasv($masv);
        $sinhvien = new taikhoansv();
        $sinhvien = $sinhvien->get_join_sinhvien();
        $quyen = new phanquyen();
        $quyen = $quyen->select();
        $view2='cntaikhoan';
        return view('admin', compact('accinf','user','sv','sinhvien','quyen','view2'));    
	}

// Xử lý thêm tài khoản
    public function insert_taikhoansv(Request $request)
    {
        try
        {
            $name = $request->input('usernamesv');
            $masv = $request->input('slsv');
            $password = $request->input('passsv');
            $insert_tksv = new taikhoansv();
            $insert_tksv = $insert_tksv->insert($name, $password, $masv);
            Session::flash('success',"Thêm tài khoản thành công!");
            return redirect()->back();
        }
        catch(Exception $e)
        {
          Session::flash('error',"Thêm tài khoản không thành công!");
          return redirect()->back();
        }
    }

// Xử lý thêm tài khoản
    public function insert_taikhoan(Request $request)
    {
        try
        {
            $name = $request->input('username');
            $macb = $request->input('slcb');
            $macv = new canbo();
            $macv = $macv->pluck_Bymacb();
            if($macv[0] == 'GV') $mapq='03';
            else $mapq ='02';
            $password = $request->input('pass');
            $insert_tk = new taikhoan();
            $insert_tk = $insert_tk->insert($name, $password, $macb, $mapq);
            Session::flash('success',"Thêm tài khoản thành công!");
            return redirect()->back();
        }
        catch(Exception $e)
        {
          Session::flash('error',"Thêm tài khoản không thành công!");
          return redirect()->back();
        }
    }

// Xử lý xóa tài khoản
    public function delete_taikhoan(Request $request)
    {
        try
        {
            $ma = $request->input('stt');
            $delete_tk = new taikhoan();
            $delete_tk = $delete_tk->delete_Bymacb($ma);
            Session::flash('success',"Xóa tài khoản thành công!");
            return redirect()->back();
        }
        catch(Exception $e)
        {
            Session::flash('error',"Xóa tài khoản không thành công!");
            return redirect()->back();
        }
    }

// Xử lý xóa tài khoản sinh viên
    public function delete_taikhoansv(Request $request)
    {
        try
        {
            $ma = $request->input('sttsv');
            $delete_tksv = new taikhoansv(); 
            $delete_tksv = $delete_tksv->delete_Bymasv($ma);
            Session::flash('success',"Xóa tài khoản thành công!");
            return redirect()->back();
        }
        catch(Exception $e)
        {
            Session::flash('error',"Xóa tài khoản không thành công!");
            return redirect()->back();
        }
    }

// xử lý Cập nhật thông tin tài khoản
    public function update_taikhoan(Request $request)
    {
      try
      {  
        $name = $request->input('name');
        $macb = $request->input('macb');
        $password = $request->input('pass');
        $update_tk = new taikhoan();
        $update_tk = $update_tk->update_Bymacb($macb, $name, $password);
        Session::flash('success',"Cập nhật tài khoản thành công!");
        return redirect()->back();
      }
      catch(Exception $e)
      {
          Session::flash('error',"Cập nhật tài khoản không thành công!");
          return redirect()->back();
      }
    }
    // xử lý Cập nhật thông tin tài khoản sinh viên
    public function update_taikhoansv(Request $request)
    {
      try
      {  
        $name = $request->input('namesv');
        $masv = $request->input('masv');
        $password = $request->input('pass');
        $update_tksv = new taikhoansv();
        $update_tksv = $update_tksv->update_Bymasv($masv, $name, $password);
        Session::flash('success',"Cập nhật tài khoản thành công!");
        return redirect()->back();
      }
      catch(Exception $e)
      {
          Session::flash('error',"Cập nhật tài khoản không thành công!");
          return redirect()->back();
      }
    }
}
