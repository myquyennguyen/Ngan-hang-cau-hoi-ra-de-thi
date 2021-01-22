<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class mucdocauhoi extends Model
{
    protected $table = 'mucdocauhoi';
    public $timestamps = false;
    public $fillable = ['MaMucDo',
    					'MucDo'];

    public function select(){
    	$mucdo = DB::table('mucdocauhoi')
    		->get();
     	return $mucdo;
    }
}
