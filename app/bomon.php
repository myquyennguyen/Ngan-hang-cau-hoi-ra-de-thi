<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class bomon extends Model
{
    protected $table = 'bomon';
    public $timestamps = false;
    public $fillable = ['MaBoMon',
    					'TenBoMon'];


    public function select(){
        $bomon = DB::table('bomon')
            ->get();
        return $bomon;
    }
    
    public function get_mabmBymacb($macb)
    {
        $mabm = DB::table('bomon')
            ->join('canbo','canbo.MaBoMon','=','bomon.MaBoMon')
            ->where('MaCanBo','=',$macb)
            ->distinct('canbo.MaBoMon')
            ->pluck('canbo.MaBoMon');
        return $mabm;
    }

    public function insert($tenbmon, $mabmon)
    {
        DB::table('bomon')
            ->insert(['TenBoMon' => $tenbmon,
                    'MaBoMon' => $mabmon
            ]);
    }

    public function update_Bymabm($mabomon, $tenbomon)
    {
        DB::table('bomon')
            ->where('MaBoMon','=',$mabomon)
            ->update(['TenBoMon' => $tenbomon]);
    }

}
