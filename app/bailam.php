<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;


class bailam extends Model
{
    protected $table = 'bailam';
    public $timestamps = false;
    public $fillable = ['IDBaiLam',
    					'name',
    					'IDDeThi',
    					'TrangThai',
    					'SoCauDung'];
    public function insertBaiLam($made, $name)
    {
    	$idbailam = DB::table('bailam')
            ->insertGetId(['IDDeThi'=>$made, 
                            'name'=>$name]);
    	return $idbailam;
    }

    public function hoanThanhBaiLam($idbailam,$diem)
    {
    	DB::table('bailam')
            ->where('IDBaiLam','=',$idbailam)
            ->update(['TrangThai'=>1, 
                    'SoCauDung'=>$diem]);
    }

    public function checkUser($name, $idde)
    {
    	$count = DB::table('bailam')
            ->where('name','=',$name)
            ->where('IDDeThi','=',$idde)
            ->count();
    	if($count != 0)
    		return 1;
    	return 0;
    }

    public function getTrangThai($name,$idde)
    {
    	$tt = DB::table('bailam')
            ->where('name','=',$name)
            ->where('IDDeThi','=',$idde)
            ->first();
    	return $tt;
    }

    public function getSoCauDung($name,$idde)
    {
    	$tt = DB::table('bailam')
            ->where('name','=',$name)
            ->where('IDDeThi','=',$idde)
            ->first();
    	return $tt->SoCauDung;
    }

    public function getIdBaiLam($name, $idde)
    {
    	$ID = DB::table('bailam')
            ->where('name','=',$name)
            ->where('IDDeThi','=',$idde)
            ->pluck('IDBaiLam');
    	return $ID[0];
    }

    public function xemKetQuaThi($idde)
    {
    	$result=DB::table('bailam')
            ->join('taikhoansv','bailam.name','taikhoansv.name')
            ->join('sinhvien', 'taikhoansv.MaSinhVien','sinhvien.MaSinhVien')
            ->where('IDDeThi',$idde)
            ->select('sinhvien.MaSinhVien','TenSinhVien','SoCauDung')
            ->distinct()
            ->get();
        return $result;
    }

    public function getTime($id)
    {
        $time = DB::table('bailam')
            ->join('dethi','bailam.IDDeThi','dethi.IDDeThi')
            ->where('bailam.IDBaiLam','=',$id)
            ->pluck('ThoiGianLamBai');
        return $time;
    }
}