<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            array('name' => 'csgo','price' => '10'),
            array('name' => 'toy car','price' => '20'),
            array('name' => 'scary game','price' => '50'),
            array('name' => 'microphone','price' => '70'),
            array('name' => 'call of duty','price' => '60'),
        ]);
    }
}
