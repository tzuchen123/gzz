<?php

use Illuminate\Database\Seeder;

class SortTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sorts')->insert([
            'title'=>'Man',
            'subtitle'=>'Man clothes',
            'slogan'=>'Best Sale Ever',
            'image'=>'/storage/uploads/images/sort/_1596443593_F18kGVTsnL.jpg'
            
        ]);
    }
}
