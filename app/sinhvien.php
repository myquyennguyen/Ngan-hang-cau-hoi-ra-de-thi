<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class sinhvien extends Model
{
    protected $table = 'sinhvien';
    public $timestamps = false;
    public $fillable = ['MaSinhVien',
    					'TenSinhVien',
    					'Gioitinh',
    					'MaBoMon'];

    public function get_Bymasv($ma)
    {
    	$sinhvien = DB::table('sinhvien')
            ->whereNotIn('MaSinhVien',$ma)
            ->get();
        return $sinhvien;
    }

    public function delete_Bymasv($ma)
    {
    	DB::table('sinhvien')
            ->where('MaSinhVien','=',$ma)
            ->delete();  
    }

    public function update_Bymasv($masv, $bomon, $hoten, $gioitinh)
    {
    	DB::table('sinhvien')
            ->where('MaSinhVien','=',$masv)
            ->update(['MaBoMon' => $bomon,
                    'TenSinhVien' => $hoten,
                    'Gioitinh' => $gioitinh]);
    }

    public function insert($masv, $hoten, $gioitinh, $bomon)
    {
    	DB::table('sinhvien')
            ->insert(['MaSinhVien' =>$masv,
                    'TenSinhVien' => $hoten,
                    'Gioitinh' => $gioitinh,
                    'MaBoMon' => $bomon]);
    }

    public function get_join_bomon()
    {
    	$sinhvien = DB::table('sinhvien')
            ->join('bomon', 'sinhvien.MaBoMon', '=', 'bomon.MaBoMon')
            ->get();
        return $sinhvien;
    }

}
