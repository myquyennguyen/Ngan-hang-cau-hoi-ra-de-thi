<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;

class taikhoansv extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array

     */
    protected $table = 'taikhoansv';
    public $timestamps = false;
    protected $fillable = [
        'name', 'password', 'MaSinhVien'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function insert($name, $password, $masv)
    {
        DB::table('taikhoansv')
            ->insert(['name' =>$name,
                    'password' =>bcrypt($password),
                    'MaSinhVien' => $masv]);
    }

    public function pluck_masv()
    {
        $taikhoansv = DB::table('taikhoansv')
            ->pluck('MaSinhVien');
        return $taikhoansv;
    }

    public function get_join_sinhvien()
    {
        $taikhoansv = DB::table('taikhoansv')
            ->join('sinhvien','sinhvien.MaSinhVien','=','taikhoansv.MaSinhVien')
            ->get();
        return $taikhoansv;
    }

    public function delete_Bymasv($ma)
    {
        DB::table('taikhoansv')
            ->where('MaSinhVien','=',$ma)
            ->delete(); 
    }

    public function update_Bymasv($masv, $name, $password)
    {
        DB::table('taikhoansv')
            ->where('MaSinhVien','=',$masv)
            ->update(['name' =>$name,
                    'password' =>bcrypt($password)]);
    }
}
