<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //truncate()清空資料表
        DB::table('tags')->truncate();
        for ($i = 1; $i < 6; $i++) {
            DB::table('tags')->insert([
                'title' => 'tag' . $i,
            ]);
        }
    }
}
