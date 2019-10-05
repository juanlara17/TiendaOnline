<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            [
                'name' => 'Super Heroes',
                'slug' => 'super-heroes',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing 
                    elit, sed do eiusmod tempor incididunt ut labore et dolore magna 
                    aliqua.',
                'color' => '#440022'
            ],
            [
                'name' => 'Geek',
                'slug' => 'geek',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing 
                    elit, sed do eiusmod tempor incididunt ut labore et dolore magna 
                    aliqua.',
                'color' => '#445500'
            ]
        );

        Category::insert($data);
    }
}
