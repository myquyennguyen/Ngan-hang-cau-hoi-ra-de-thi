<?php

use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Trang chủ
Route::get('trangchu', function () {
    return view('trangchu');
});

//NHcontroller
Route::get('cnbomon','NHController@cnbomon');
// bộ môn
Route::post('update_bomon','NHController@update_bomon');
Route::post('insert_bomon','NHController@insert_bomon');
// môn học
Route::post('update_monhoc','NHController@update_monhoc');
Route::post('insert_monhoc','NHController@insert_monhoc');


//usercontroller
//cán bộ
Route::get('cncanbo','UserController@cncanbo');
Route::post('update_canbo','UserController@update_canbo');
Route::post('insert_canbo','UserController@insert_canbo');
//sinh viên
Route::get('cnsinhvien','UserController@cnsinhvien');
Route::post('insert_sinhvien','UserController@insert_sinhvien');
Route::post('update_sinhvien','UserController@update_sinhvien');
Route::post('delete_sinhvien','UserController@delete_sinhvien');

//taikhoancontroller
//tài khoản
Route::get('cntaikhoan','AccountController@cntaikhoan');
Route::post('insert_taikhoan','AccountController@insert_taikhoan');
Route::post('update_taikhoan','AccountController@update_taikhoan');
Route::post('delete_taikhoan','AccountController@delete_taikhoan');
Route::post('insert_taikhoansv','AccountController@insert_taikhoansv');
Route::post('update_taikhoansv','AccountController@update_taikhoansv');
Route::post('delete_taikhoansv','AccountController@delete_taikhoansv');

//CHcontroller
//duyệt câu hỏi
Route::post('xoach','CHController@xoach');
Route::get('xemdch','CHController@xemdch');
Route::post('duyetch','CHController@duyetch');
Route::get('searchdch','CHController@searchdch');
Route::get('duyetcauhoi','CHController@duyetcauhoi');
//xem câu hỏi
Route::get('xemxch','CHController@xemxch');
Route::get('xemcauhoi','CHController@xemcauhoi');
Route::get('searchxch','CHController@searchxch');
Route::get('xemcauhoitbm','CHController@xemcauhoitbm');
Route::get('searchxchTBM','CHController@searchxchTBM');


//Homecontroller
//xuất đề thi
Route::post('xuatde', 'HomeController@xuatde');

//Dethicontroller
//tạo đề thi
Route::get('taodethi','DethiController@taodethi');
Route::get('taodethitbm','DethiController@taodethitbm');
Route::post('xuly_taodethi','DethiController@xuly_taodethi');
Route::post('xuly_taodethitbm','DethiController@xuly_taodethitbm');
//xem đề thi
Route::get('xemdethi','DethiController@xemdethi');
Route::get('xemdethitbm','DethiController@xemdethitbm');
Route::get('xemnoidungde','DethiController@xemnoidungde');
//search đề thi
Route::get('searchdethi','DethiController@searchdethi');
Route::get('searchdethithu','DethiController@searchdethithu');
Route::get('searchdethitbm','DethiController@searchdethitbm');
//đề thi
Route::get('thi','DethiController@thi');
Route::post('ketqua','DethiController@ketqua');
Route::post('nopbai', 'Dethicontroller@nopbai');
Route::get('xoadeonl','Dethicontroller@xoadeonl');
//Route::get('xoadegoc','Dethicontroller@xoadegoc');
Route::post('luudapan','Dethicontroller@luudapan');
Route::get('xuatbailam','Dethicontroller@xuatbailam');
Route::post('xuatthithu','Dethicontroller@xuatthithu');
Route::get('xemketquathi','Dethicontroller@xemketquathi');
Route::post('kiemtramatkhau','Dethicontroller@kiemtramatkhau');
Route::get('noidungdethithu','DethiController@noidungdethithu');

//uploadcontroller
Route::post('uptungcau','UploadController@uptungcau');
Route::post('uploadfile','UploadController@uploadfile');
Route::get('uploadcauhoi','UploadController@uploadcauhoi');

//Taikhoancontroller
Route::get('login','TaikhoanController@login');
Route::get('logout','TaikhoanController@logout');
Route::post('postlogin','TaiKhoanController@postLogin');
Route::get('page-admin','TaikhoanController@showPageAdmin');
Route::get('page-giangvien','TaikhoanController@showPageGiangvien');
Route::get('page-truongbomon','TaikhoanController@showPageTruongbomon');















