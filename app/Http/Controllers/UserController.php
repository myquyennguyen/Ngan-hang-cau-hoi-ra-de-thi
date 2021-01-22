<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Session;
use Exception;
use App\canbo;
use App\chucvu;
use App\bomon;
use App\sinhvien;
class UserController extends Controller
{
// view cập nhật cán bộ
    public function cncanbo()
    {
        $canbo = new canbo();
        $canbo = $canbo->get_join_bomon_chucvu();
        $bomon = new bomon();
        $bomon = $bomon->select();
        $chucvu = new chucvu();
        $chucvu = $chucvu->select();
        $view2='cncanbo';
            return view('admin', compact('canbo','bomon','chucvu','view2'));
    }

// view cập nhật sinh viên
    public function cnsinhvien()
    {
        $sinhvien = new sinhvien();
        $sinhvien = $sinhvien->get_join_bomon();
        $bomon = new bomon();
        $bomon = $bomon->select();
        $view2='cnsinhvien';
            return view('admin', compact('sinhvien','bomon','view2'));
    }


// xử lý cập nhật thông tin cán bộ
   public function update_canbo(Request $request)
    {
        try
        {
            $macb = $request->input('macb');
            $hoten = $request->input('hoten_edit');
            $ngaysinh = $request->input('ngaysinh_edit');
            $gioitinh = $request->input('gioitinh_edit');
            $hocvi = $request->input('hocvi_edit');
            $bomon = $request->input('bomon_edit');
            $chucvu = $request->input('chucvu_edit');
            $update_cb = new canbo();
            $update_cb =$update_cb->update_Bymacb($macb, $bomon, $hoten, $ngaysinh, $gioitinh, $hocvi, $chucvu);
            Session::flash('success',"Cập nhật cán bộ thành công");
            return redirect()->back();
        }
        catch(Exception $e)
        {
            Session::flash('error',"Cập nhật cán bộ không thành công!");
            return redirect()->back();
        }
    }

// xử lý thêm cán bộ
    public function insert_canbo(Request $request)
    {
        try
        {
            $macb = $request->input('macb_insert');
            $hoten = $request->input('hoten_insert');
            $ngaysinh = $request->input('ngaysinh_insert');
            $gioitinh = $request->input('gioitinh_insert');
            $hocvi = $request->input('hocvi_insert');
            $bomon = $request->input('bomon_insert');
            $chucvu = $request->input('chucvu_insert');
            $insert_cb = new canbo();
            $insert_cb = $insert_cb->insert($macb, $bomon, $hoten, $ngaysinh, $gioitinh, $hocvi, $chucvu);
            Session::flash('success',"Thêm cán bộ thành công!");
            return redirect()->back();
        }
        catch(Exception $e)
        {
            Session::flash('error',"Thêm cán bộ không thành công!");
            return redirect()->back();
        }
    }

// xử lý thêm sinh viên
    public function insert_sinhvien(Request $request)
    {
        try
        {
            $masv = $request->input('macb_insert');
            $hoten = $request->input('hoten_insert');
            $gioitinh = $request->input('gioitinh_insert');
            $bomon = $request->input('bomon_insert');
            $insert_sv = new sinhvien();
            $insert_sv = $insert_sv->insert($masv, $hoten, $gioitinh, $bomon);
            Session::flash('success',"Thêm sinh viên thành công!");
            return redirect()->back();
        }
        catch(Exception $e)
        {
            Session::flash('error',"Thêm sinh viên không thành công!");
            return redirect()->back();
        }
    }

// Xử lý cập nhật thông tin sinh viên
    public function update_sinhvien(Request $request)
    {
        try
        {
            $masv = $request->input('macb');
            $hoten = $request->input('hoten_edit');
            $gioitinh = $request->input('gioitinh_edit');
            $bomon = $request->input('bomon_edit');
            $update_sv = new sinhvien();
            $update_sv = $update_sv->update_Bymasv($masv, $bomon, $hoten, $gioitinh);
            Session::flash('success',"Cập nhật thông tin sinh viên thành công!");
            return redirect()->back();
        }
        catch(Exception $e)
        {
            Session::flash('error',"Cập nhật thông tin sinh viên không thành công!");
            return redirect()->back();
        }
    }

// xử lý xóa sinh viên
    public function delete_sinhvien(Request $request)
    {
        try
        {
            $ma = $request->input('stt');
            $delete_sv = new sinhvien();
            $delete_sv = $delete_sv->delete_Bymasv($ma);
            Session::flash('success',"Xóa sinh viên thành công!");
            return redirect()->back();
        }
        catch(Exception $e)
        {
            Session::flash('error',"Xóa sinh viên không thành công!");
            return redirect()->back();
        }
    }
}