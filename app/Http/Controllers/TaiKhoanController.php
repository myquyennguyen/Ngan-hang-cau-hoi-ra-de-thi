<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Database\Seeder;
use DB;
use App\phanquyen;
use Session;

class TaiKhoanController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = RouteServiceProvider::HOME;

    public function showPageAdmin()
    {  
        if(!$this->userCan('view-admin'))
        {
            abort('403', __('Bạn không có quyền truy cập trang này!'));
            return false;
        }
        return true;
    }

    public function showPageTruongbomon()
    {
        if(!$this->userCan('view-truongbomon'))
        {
            abort('403', __('Bạn không có quyền truy cập trang này!'));
             return false;
        }
         return true;
    }

     public function showpagethi()
     {
        if(!$this->userCan('view-thi'))
        {
            abort('403', __('Bạn không có quyền truy cập trang này!'));
            return false;
        }
         return true;
    }
    
    public function showPageGiangvien(){
        if(!$this->userCan('view-giangvien'))
        {
            abort('403', __('Bạn không có quyền truy cập trang này!'));
            return false;
        }
        return true;
    }
    
//xử lý đăng nhập
    public function postLogin(Request $rq){
        $username = $rq->username;
        $password = $rq->password;
        $view = $rq->input('phanquyen');
        if($view == 04 ){
                $arr = [
                'name' => $username,
                'password' => $password,
            ];
            if(Auth::guard('taikhoansv')->attempt($arr)){
                Session::put('usernamesv',$username);
                return redirect('thi');
            }
            else{
                Session::flash('error',"Tên đăng nhập hoặc mật khẩu không chính xác!");
                return redirect()->back();
            }

        }
        elseif($view == 01 ){
                $arr = [
                'name' => $username,
                'password' => $password,
            ];
            if(Auth::guard('admin')->attempt($arr)){
                Session::put('usernamead',$username);
                return redirect('cntaikhoan');
            }
            else{
                Session::flash('error',"Tên đăng nhập hoặc mật khẩu không chính xác!");
                return redirect()->back();
            }

        }
        else
        if (Auth::attempt(['name'=>$username,'password'=>$password])) 
        {
            Session::put('username', Auth::user());
            switch ($view) 
            {
                case '02': if($this->showPageTruongbomon())
                {
                    Session::put('phanquyen','02');
                    return redirect('duyetcauhoi');
                }
                case '03': if($this->showPageGiangvien())
                {
                    Session::put('phanquyen','03');
                    return redirect('uploadcauhoi');
                }
                default:
                    abort('403', __('Xảy ra lỗi!'));
                    break;
            }  
        }
        else
        {
            Session::flash('error',"Tên đăng nhập hoặc mật khẩu không chính xác!");
            return redirect()->back();
        }
    }

// view đăng nhập
    public function login()
    {
        $quyen = new phanquyen();
        $quyen = $quyen->select();
        return view('login',compact('quyen'));
    }

// xử lý đăng xuất
    public function logout(){
        auth()->logout();
        Session::flush();
        return redirect('login');
    }
}
