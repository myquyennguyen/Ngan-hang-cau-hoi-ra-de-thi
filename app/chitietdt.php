<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class chitietdt extends Model
{
    protected $table = 'chitietdt';
    public $timestamps = false;
    public $fillable = ['IDDeThi',
    					'IDCauHoi'];

    public function insert($id, $idch)
    {
    	DB::table('chitietdt')
            ->insert([
                'IDDeThi' => $id,
                'IDCauHoi' => $idch
            ]);
    }

    public function get_chitiet($id)
    {
        $dethi = DB::table('chitietdt')
            ->join('cauhoi','chitietdt.IDCauHoi','=','cauhoi.IDCauHoi')
            ->where('IDDeThi', '=', $id )
            ->get();
        return $dethi;
    }

    public function get_random($id)
    {
        $dethi = DB::table('chitietdt')
            ->join('cauhoi','chitietdt.IDCauHoi','=','cauhoi.IDCauHoi')
            ->where('IDDeThi', '=', $id )
            ->inRandomOrder()
            ->get();
        return $dethi;
    }

    public function count_chitiet($id)
    {
        $dethi = DB::table('chitietdt')
            ->join('cauhoi','chitietdt.IDCauHoi','=','cauhoi.IDCauHoi')
            ->where('IDDeThi', '=', $id )
            ->count();
        return $dethi;
    }
}
