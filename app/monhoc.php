<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class monhoc extends Model
{
    protected $table = 'monhoc';
    public $timestamps = false;
    public $fillable = ['MaMonHoc',
    					'TenMonHoc',
    					'MaBoMon'];

    public function select()
    {
    	$monhoc = DB::table('monhoc')
            ->get();
     	return $monhoc;
    }
    
    public function get_mamhBymacb($macb)
    {
        $mabm = DB::table('monhoc')
            ->join('bomon','bomon.MaBoMon','=','monhoc.MaBoMon')
            ->join('canbo','canbo.MaBoMon','=','bomon.MaBoMon')
            ->where('MaCanBo','=',$macb)
            ->distinct('MaMonHoc')
            ->pluck('MaMonHoc');
        return $mabm;
    }

    public function get_mamhBymabm($mabm)
    {
        $monhoc = DB::table('monhoc')
            ->where('MaBoMon','=',$mabm)
            ->get();
        return $monhoc;
    }

    public function insert($mamon, $tenmon, $bomon)
    {
        DB::table('monhoc')
            ->insert(['MaMonHoc' => $mamon,
                    'TenMonHoc' => $tenmon,
                    'MaBoMon' => $bomon]);
    }

    public function update_Bymamh($mamon, $tenmon, $bomon)
    {
        DB::table('monhoc')
            ->where('MaMonHoc','=',$mamon)
            ->update(['TenMonHoc' => $tenmon,
                    'MaBoMon' => $bomon]);
    }

    public function pluck_ByidDe($idde)
    {
        $dethi = DB::table('dethi')
            ->where('IDDeThi','=',$idde)
            ->pluck('MaMonHoc');
        return $dethi;
    }
}
