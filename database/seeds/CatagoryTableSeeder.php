<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatagoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //truncate()清空資料表
         DB::table('catagorys')->truncate();
         for ($i = 1; $i < 6; $i++) {
             DB::table('catagorys')->insert([
                 'title' => 'catagory' . $i,
             ]);
    }
}
