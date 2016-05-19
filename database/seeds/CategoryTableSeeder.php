<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
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
           'name'        =>'Super Heroes',
           'slug'        =>'super-heroes',
           'description' => 'Lorem ipsum dolor sit amet, consecteur adipisicing elit. Tempore,perferendis!',
           'color'       => '#440022'
           ],
           [
           'name' => 'Geek',
           'slug' => 'geek',
           'description' => 'Lorem ipsum dolor sit amet, consecteur adipisicing elit. Tempore,perferendis!',
           'color' => '#445500'
           ]
        );

        Category::insert($data);
    }
}