<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class hinhanhda extends Model
{
    protected $table = 'hinhanhda';
    public $timestamps = false;
    public $fillable = ['IDAnh',
    					'IDDapAn',
    					'Vitri'];

    public function get_hinhanhda($idda)
    {
        $hinhanhda = DB::table('hinhanhda')
            ->where('IDDapAn', '=', $idda)
            ->get();
        return $hinhanhda;
    }

    public function insert($idda, $path)
    {
        DB::table('hinhanhda')
            ->insert([
                'IDDapAn'=>$idda,
                'Vitri'=>$path]);
    }

    public function deletehada($ma)
    {
        DB::table('hinhanhda')
            ->whereIn('IDDapAn',$ma)
            ->delete();
    }
}
