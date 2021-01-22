<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class canbo extends Model
{
    protected $table = 'canbo';
    public $timestamps = false;
    public $fillable = ['MaCanBo',
    					'MaBoMon',
    					'HoTen',
    					'NgaySinh',
    					'Gioitinh',
    					'HocVi',
    					'MaChucVu'];

    public function get_Bymacb($ma)
    {
        $canbo = DB::table('canbo')
            ->whereNotIn('MaCanBo',$ma)
            ->get();
        return $canbo;
    }

    public function pluck_Bymacb($macb)
    {
        $canbo = DB::table('canbo')
            ->where('MaCanBo','=',$macb)
            ->pluck('MaChucVu');
        return $canbo;
    }

    public function insert($macb, $bomon, $hoten, $ngaysinh, $gioitinh, $hocvi, $chucvu)
    {
        DB::table('canbo')
            ->insert(['MaCanBo' =>$macb,
                    'MaBoMon' => $bomon,
                    'HoTen' => $hoten,
                    'NgaySinh' => $ngaysinh,
                    'Gioitinh' => $gioitinh,
                    'HocVi' => $hocvi,
                    'MaChucVu' =>$chucvu]);
    }

    public function update_Bymacb($macb, $bomon, $hoten, $ngaysinh, $gioitinh, $hocvi, $chucvu)
    {
        DB::table('canbo')
            ->where('MaCanBo','=',$macb)
            ->update(['MaBoMon' => $bomon,
                    'HoTen' => $hoten,
                    'NgaySinh' => $ngaysinh,
                    'Gioitinh' => $gioitinh,
                    'HocVi' => $hocvi,
                    'MaChucVu' =>$chucvu]);
    }

    public function get_join_bomon_chucvu()
    {
        $canbo = DB::table('canbo')
            ->join('chucvu', 'canbo.MaChucVu', '=', 'chucvu.MaChucVu')
            ->join('bomon', 'canbo.MaBoMon', '=', 'bomon.MaBoMon')
            ->OrderBy('MaCanBo')
            ->select('canbo.*', 'chucvu.TenChucVu', 'bomon.TenBoMon')
            ->get();
        return $canbo;
    }

}
