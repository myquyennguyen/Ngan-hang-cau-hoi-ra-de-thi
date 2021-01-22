<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('taikhoan')->insert([
          ['name' => 'abc'],

          ['password'=>bcrypt('abc')],
          ['MaPhanQuyen'=>1],

          ['MaCanBo'=>'CB02']
        ]);
    }
}
