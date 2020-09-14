<?php

use App\Sort;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SortTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('sorts')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $sort = factory(Sort::class, 3)->create();

        // DB::table('sorts')->insert([
        //     'title'=>'Man',
        //     'subtitle'=>'Man clothes',
        //     'slogan'=>'Best Sale Ever',
        //     'image'=>'/storage/uploads/images/sort/_1596443593_F18kGVTsnL.jpg'

        // ]);

        // DB::table('sorts')->insert([
        //     'title'=>'Woman',
        //     'subtitle'=>'Woman clothes',
        //     'slogan'=>'Best Sale Ever',
        //     'image'=>'/storage/uploads/images/sort/_1596443593_F18kGVTsnL.jpg'

        // ]);

        // DB::table('sorts')->insert([
        //     'title'=>'Discount',
        //     'subtitle'=>'Discount clothes',
        //     'slogan'=>'Best Sale Ever',
        //     'image'=>'/storage/uploads/images/sort/_1596443593_F18kGVTsnL.jpg'

        // ]);
    }
}
