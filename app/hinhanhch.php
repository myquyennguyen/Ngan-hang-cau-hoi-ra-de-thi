<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class hinhanhch extends Model
{
    protected $table = 'hinhanhch';
    public $timestamps = false;
    public $fillable = ['IDAnh',
    					'IDCauHoi',
    					'Vitri'];

    public function get_hinhanhch($idch)
    {
    	$hinhanhch = DB::table('hinhanhch')
            ->where('IDCauHoi', '=', $idch)
            ->get();
        return $hinhanhch;
    }

    public function insert($idch, $path)
    {
        DB::table('hinhanhch')
            ->insert([
                'IDCauHoi'=>$idch,
                'ViTri'=>$path]);
    }

    public function deletehach($ma)
    {
        DB::table('hinhanhch')
            ->where('IDCauHoi','=',$ma)
            ->delete();
    }
}
