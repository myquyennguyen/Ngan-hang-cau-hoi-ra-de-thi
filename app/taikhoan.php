<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\canbo;

class taikhoan extends Model
{
    protected $table = 'taikhoan';
    public $timestamps = false;
    public $fillable = ['name',
    					'password',
    					'MaCanBo',
    					'MaPhanQuyen'];

    public function getAccountsInf(){
    	$accounts = DB::table('taikhoan')
            ->join('canbo','taikhoan.MaCanBo','=','canbo.MaCanBo')
            ->select('taikhoan.name','canbo.MaCanBo','canbo.HoTen')
            ->get();
    	return $accounts;
    }

    public function pluck_macb()
    {
        $taikhoan = DB::table('taikhoan')
            ->pluck('MaCanBo');
        return $taikhoan;
    }

    public function get_join_canbo_phanquyen()
    {
        $taikhoan = DB::table('taikhoan')
            ->join('canbo','taikhoan.MaCanBo','=','canbo.MaCanBo')
            ->join('phanquyen','phanquyen.MaPhanQuyen','=','taikhoan.MaPhanQuyen')
            ->get();
        return $taikhoan;
    }

    public function insert($name, $password, $macb, $mapq)
    {
        DB::table('taikhoan')
            ->insert(['name' =>$name,
                    'password' =>bcrypt($password),
                    'MaCanBo' => $macb,
                    'MaPhanQuyen' => $mapq]);
    }

    public function delete_Bymacb($ma)
    {
        DB::table('taikhoan')
            ->where('MaCanBo','=',$ma)
            ->delete();  
    }

    public function update_Bymacb($macb, $name, $password)
    {
        DB::table('taikhoan')
            ->where('MaCanBo','=',$macb)
            ->update(['name' =>$name,
                    'password' =>bcrypt($password),]);
    }

}
