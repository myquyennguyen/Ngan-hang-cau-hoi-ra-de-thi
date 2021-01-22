<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class phanquyen extends Model
{
    protected $table = 'phanquyen';
    public $timestamps = false;
    public $fillable = ['MaPhanQuyen',
    					'TenPhanQuyen'];

    public function select()
    {
    	$phanquyen = DB::table('phanquyen')
    		->get();
    	return $phanquyen;
    }
}
