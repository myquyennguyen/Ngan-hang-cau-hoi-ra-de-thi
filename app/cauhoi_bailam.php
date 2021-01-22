<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class cauhoi_bailam extends Model
{
    protected $table = 'cauhoi_bailam';
    public $timestamps = false;
    public $fillable = ['ID',
    					'IDBaiLam',
    					'IDCauHoi'];

	public function layNoiDungCauHoi($idbailam)
	{
		$ndch=DB::table('cauhoi_bailam')
            ->join('cauhoi','cauhoi_bailam.IDCauHoi','=','cauhoi.IDCauHoi')
            ->where('IDBaiLam', '=', $idbailam )
            ->select('cauhoi_bailam.ID','cauhoi_bailam.IDCauHoi','cauhoi.CHNoiDung')
            ->get();
	    return $ndch;
	}

	public function soLuongCauHoi($idbailam)
	{
		$slch = DB::table('cauhoi_bailam')
	        ->join('cauhoi','cauhoi_bailam.IDCauHoi','=','cauhoi.IDCauHoi')
	        ->where('IDBaiLam', '=', $idbailam )
	        ->count();
        return $slch;
	}

	public function insert_getID($id,$idch)
	{
		$id = DB::table('cauhoi_bailam')
			->insertGetId(['IDBaiLam'=>$id,
							'IDCauHoi'=>$idch]);
		return $id;
	}
}
