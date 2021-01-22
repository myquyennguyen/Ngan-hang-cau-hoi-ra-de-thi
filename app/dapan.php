<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class dapan extends Model
{
    protected $table = 'dapan';
    public $timestamps = false;
    public $fillable = ['IDDapAn',
    					'IDCauHoi',
    					'NoiDung',
    					'TrangThai'];

    public function get_dapan($idch)
    {
    	$dapan = DB::table('dapan')
            ->where('IDCauHoi', '=', $idch)
            ->get();
        return $dapan;
    }

    public function get_trangthai($id)
    {
    	$dapan = DB::table('dapan')
	        ->where('IDDapAn','=',$id)
	        ->pluck('TrangThai'); 
	    return $dapan;
    }

    public function get_noidung($idch,$trangthai)
    {
    	$dapan = DB::table('dapan')
                    ->where('IDCauHoi','=',$idch)
                    ->where('TrangThai','=',$trangthai)
                    ->pluck('NoiDung');
        return $dapan;
    }

    public function insert($id, $noidung, $trangthai)
    {
        DB::table('dapan')
            ->insert([
                'IDCauHoi'=>$id,
                'NoiDung'=>$noidung,
                'TrangThai'=>$trangthai,
            ]);
    }

    public function insert_getID($idch,$noidung,$trangthai)
    {
        $dapan = DB:: table('dapan')
            ->insertGetId([
                'IDCauHoi'=>$idch, 
                'NoiDung'=>$noidung,
                'TrangThai'=>$trangthai]);
        return $dapan;
    }

    public function get_ByidCH($idch)
    {
        $dapan = DB::table('dapan')
           ->where('IDCauHoi',$idch)
           ->inRandomOrder()
           ->get();
        return $dapan;
    }

    public function get_ByidCH_order($idch)
    {
        $dapan = DB::table('dapan')
            ->select()
            ->where('IDCauHoi', '=', $idch )
            ->orderBy('IDDapAn')
            ->get();
        return $dapan;
    }

    public function deleteda($ma)
    {
        DB::table('dapan')
            ->where('IDCauHoi','=',$ma)
            ->delete();
    }

    public function pluck_ByidCH($ma)
    {
        $dapan = DB::table('dapan')
            ->where('IDCauHoi','=',$ma)
            ->pluck('IDDapAn');
        return $dapan;
    }
}
