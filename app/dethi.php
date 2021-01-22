<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class dethi extends Model
{
    protected $table = 'dethi';
    public $timestamps = false;
    public $fillable = [
    					'MaCanBo',
    					'MaMonHoc',
    					'TieuDe',
    					'NgayTao',
    					'SLCauHoi',
    					'ThoiGianLamBai',
    					'Test'];



    public function get_madeBymacb($macb)
    {
        $made = DB::table('dethi')
            ->where('MaCanBo','=',$macb)
            ->get();
        return $made;
    }

    public function get_madeBymamh($mamh)
    {
        $made = DB::table('dethi')
            ->whereIn('MaMonHoc',$mamh)
            ->get();
        return $made;
    }

    public function insert_getID($macb, $monhoc, $tieude, $date, $sl, $thoigian)
    {
        $id = DB::table('dethi')
            ->insertGetId(['MaCanBo' => $macb,
                        'MaMonHoc' => $monhoc,
                        'TieuDe' => $tieude,
                        'NgayTao' => $date,
                        'Password' =>'',
                        'SLCauHoi' => $sl,
                        'ThoiGianLamBai' => $thoigian]);
        return $id;
    } 

    public function updateTest($made, $pass)
    {
        DB::table('dethi')
            ->where('IDDeThi','=',$made)
            ->update(['Test'=>1, 'Password'=>$pass]);
    }

    public function deleteTest($made)
    {
        DB::table('dethi')
            ->where('IDDeThi','=',$made)
            ->update(['Test'=>0]);
    }

    public function get_IDdecb($macb, $mamh)
    {
        $dethi = DB::table('dethi')
            ->where('MaCanBo','=',$macb)
            ->where('MaMonHoc', '=',$mamh)
            ->get();
        return $dethi;
    }

    public function get_IDde($mamh)
    {
        $dethi = DB::table('dethi')
            ->where('MaMonHoc', 'like','%'. $mamh .'%')
            ->get();
        return $dethi;
    }

    public function get_ID($id)
    {
        $dethi = DB::table('chitietdt')
            ->join('cauhoi','chitietdt.IDCauHoi','=','cauhoi.IDCauHoi')
            ->where('IDDeThi', 'like','%'. $id .'%')
            ->get();
        return $dethi;
    }

    public function get_IDthithu($mamh)
    {
        $dethi = DB::table('dethi')
            ->where('MaMonHoc', 'like','%'.$mamh.'%')
            ->where('test','=',1)
            ->get();
        return $dethi;
    }

    public function get_dethithu()
    {
        $dethi = DB::table('dethi')
            ->where('test','=',1)
            ->get();
        return $dethi;
    }

    public function pluck_ByidDe($idde)
    {
        $dethi = DB::table('dethi')
            ->where('IDDeThi','=',$idde)
            ->pluck('ThoiGianLamBai');
        return $dethi;
    }

    public function getPassword($idde)
    {
        $pass = DB::table('dethi')
            ->where('IDDeThi','=',$idde)
            ->pluck('Password');
        return $pass; 
    }

    public function getSoLuongCauHoi($idde)
    {
        $sl = DB::table('dethi')
            ->where('IDDeThi','=',$idde)
            ->pluck('SLCauHoi');
        return $sl[0];
    }

    // public function deleteDeThi($idde)
    // {
    //     DB::table('dethi')
    //     ->where('IDDeThi','=',$idde)
    //     ->delete();
    // }
}
