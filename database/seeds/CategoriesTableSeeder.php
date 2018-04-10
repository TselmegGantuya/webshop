	<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            array('name' => 'toys'),
            array('name' => 'games'),
            array('name' => 'cars'),
            array('name' => 'fun'),
            array('name' => 'spooky'),
        ]);

    }
}
