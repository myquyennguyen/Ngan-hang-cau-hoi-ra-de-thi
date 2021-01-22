<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class chucvu extends Model
{
    protected $table = 'chucvu';
    public $timestamps = false;
    public $fillable = ['MaChucVu',
    					'TenChucVU'];

    public function select()
    {
    	$chucvu = DB::table('chucvu')
    		->get();
        return $chucvu;
    }
}
