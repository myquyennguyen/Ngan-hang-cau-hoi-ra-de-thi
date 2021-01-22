<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class cauhoi extends Model
{
    protected $table = 'cauhoi';
    public $timestamps = false;
    public $fillable = [
    					'MaCanBo',
    					'MaMonHoc',
    					'CHNoiDung',
    					'MaMucDo'];

    public function select(){
        $cauhoi = DB::table('cauhoi')->get();
        return $cauhoi;
    }

    public function count_cauhoi($mamd, $mamh)
    {
        $cauhoi = DB::table('cauhoi')
            ->where('MaMucDo','=',$mamd)
            ->where('Duyet','=',1)
            ->where('MaMonHoc','=',$mamh)
            ->count();
        return $cauhoi;
    }

    public function count_cauhoicb($mamd, $mamh, $macb)
    {
        $cauhoi = DB::table('cauhoi')
            ->where('MaMucDo','=',$mamd)
            ->where('Duyet','=',1)
            ->where('MaMonHoc','=',$mamh)
            ->where('MaCanBo','=', $macb)
            ->count();
        return $cauhoi;
    }

    public function get_cauhoi($mamd, $mamh, $soluong)
    {
        $cauhoi = DB::table('cauhoi')
            ->select('IDCauHoi','Count')
            ->where('MaMucDo','=',$mamd)
            ->where('Duyet','=',1)
            ->where('MaMonHoc','=',$mamh)
            ->OrderBy('Count')    
            ->get()->take($soluong);
        return $cauhoi;
    }

    public function get_cauhoicb($mamd, $mamh, $macb, $soluong)
    {
        $cauhoi = DB::table('cauhoi')
            ->select('IDCauHoi','Count')
            ->where('MaMucDo','=',$mamd)
            ->where('Duyet','=',1)
            ->where('MaMonHoc','=',$mamh)
            ->where('MaCanBo','=',$macb)
            ->OrderBy('Count')    
            ->get()->take($soluong);
        return $cauhoi;
    }

    public function updatech($idch, $count)
    {
        DB::table('cauhoi')
                ->where('IDCauHoi','=',$idch)
                ->update(['Count'=>$count]);
    }

    public function count()
    {
        $cauhoi = DB::table('cauhoi')->count();
        return $cauhoi;
    }

    public function insert_getID($macb, $monhoc, $noidung, $mucdo)
    {
        $cauhoi = DB::table('cauhoi')
            ->insertGetId([
                'MaCanBo'=>$macb,
                'MaMonHoc'=>$monhoc,
                'CHNoidung'=>$noidung,
                'MaMucDo'=>$mucdo,
            ]);
        return $cauhoi;
    }

    public function xem($mamh, $duyet)
    {
        $cauhoi = DB::table('cauhoi')
            ->join('mucdocauhoi', 'cauhoi.MaMucDo', '=', 'mucdocauhoi.MaMucDo')
            ->join('monhoc', 'cauhoi.MaMonHoc', '=', 'monhoc.MaMonHoc')
            ->whereIn('cauhoi.MaMonHoc',$mamh)
            ->where('Duyet','=',$duyet)
            ->get();
        return $cauhoi;
    }

    public function xem_Bymacb($macb,$duyet)
    {
        $cauhoi = DB::table('cauhoi')
            ->join('mucdocauhoi', 'cauhoi.MaMucDo', '=', 'mucdocauhoi.MaMucDo')
            ->join('monhoc', 'cauhoi.MaMonHoc', '=', 'monhoc.MaMonHoc')
            ->select('cauhoi.*', 'mucdocauhoi.MucDo', 'monhoc.TenMonHoc')
            ->where('MaCanBo','=',$macb)
            ->where('Duyet','=',$duyet)
            ->get();
        return $cauhoi;
    }

    public function search_Bymacb($duyet, $macb, $search)
    {
        $cauhoi = DB::table('cauhoi')
            ->join('mucdocauhoi', 'cauhoi.MaMucDo', '=', 'mucdocauhoi.MaMucDo')
            ->join('monhoc', 'cauhoi.MaMonHoc', '=', 'monhoc.MaMonHoc')
            ->select('cauhoi.*', 'mucdocauhoi.MucDo', 'monhoc.TenMonHoc')
            ->where('Duyet','=',$duyet)
            ->where('cauhoi.MaCanBo','=',$macb)
            ->where('monhoc.MaMonHoc', 'LIKE', '%' . $search . '%')
            ->get();
        return $cauhoi;
    }

    public function search($mamh, $duyet, $search)
    {
        $cauhoi = DB::table('cauhoi')
            ->join('mucdocauhoi', 'cauhoi.MaMucDo', '=', 'mucdocauhoi.MaMucDo')
            ->join('monhoc', 'cauhoi.MaMonHoc', '=', 'monhoc.MaMonHoc')
            ->select('cauhoi.*', 'mucdocauhoi.MucDo', 'monhoc.TenMonHoc')
            ->whereIn('cauhoi.MaMonHoc',$mamh)
            ->where('Duyet','=',$duyet)
            ->where('monhoc.MaMonHoc', 'LIKE', '%' . $search . '%')
            ->get();
        return $cauhoi;
    }

    public function get_ByidDe($idde)
    {
        $cauhoi = DB::table('cauhoi')
            ->join('chitietdt','chitietdt.IDCauHoi','=','cauhoi.IDCauHoi')
            ->where('IDDeThi', '=', $idde )
            ->select('cauhoi.IDCauHoi','CHNoiDung')
            ->inRandomOrder()
            ->get();
        return $cauhoi;
    }

    public function deletech($ma)
    {
        DB::table('cauhoi')
            ->where('IDCauHoi','=',$ma)
            ->delete();
    }

    public function duyet($ma)
    {
        DB::table('cauhoi')
            ->where('IDCauHoi','=',$ma)
            ->update(['Duyet'=>1]); 
    }

    public function get_ByID($id)
    {
        $cauhoi = DB::table('cauhoi')
            ->where('IDCauHoi', '=',  $id )
            ->get();
        return $cauhoi;
    }

}
