<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class dapan_bailam extends Model
{
    protected $table = 'dapan_bailam';
    public $timestamps = false;
    public $fillable = ['ID',
    					'IDDapAn',
    					'IDCHBL',
    					'TrangThai'];

    public function layNoiDungDapAn($id)
    {
    	$ndda = DB::table('dapan_bailam')
            ->join('dapan','dapan_bailam.IDDapAn','=','dapan.IDDapAn')
            ->where('dapan_bailam.IDCHBL','=',$id)
            ->select('dapan_bailam.ID','dapan_bailam.IDDapAn','dapan.NoiDung','dapan_bailam.TrangThai')
            ->get(); 
        return $ndda;  
    }

    public function layCauHoi_DapAn($idbailam, $idda)
    {
    	$ch_da=DB::table('dapan_bailam')
            ->join('cauhoi_bailam','dapan_bailam.IDCHBL','cauhoi_bailam.ID')
            ->where('IDBaiLam','=',$idbailam)
            ->where('IDDapAn','=',$idda)
            ->select()
            ->get();
        return $ch_da;
    }
    
    public function luuDapAn($idda, $idch_bl){
    	DB::table('dapan_bailam')
            ->where('IDCHBL','=',$idch_bl)
            ->update(['TrangThai'=>0]);   
        DB::table('dapan_bailam')
  			->where('IDCHBL','=',$idch_bl)
            ->where('IDDapAn','=',$idda)
            ->update(['TrangThai'=>1]);
    }

    public function insert_getID($id, $idda, $trangthai)
    {
        $id = DB::table('dapan_bailam')
            ->insertGetId(['IDCHBL'=>$id, 
                           'IDDapAn'=>$idda,
                           'TrangThai'=>$trangthai]);
        return $id;
    }
}