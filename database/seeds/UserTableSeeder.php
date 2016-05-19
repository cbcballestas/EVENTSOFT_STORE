<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
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
				'name'       => 'Carlos',
				'last_name'  => 'Ballestas',
				'email'      => 'cbcballestas@gmail.com',
				'user'       => 'CarlosAlberto',
				'password'   => \Hash::make('1234'),
				'type'       =>'admin',
				'active'     => 1,
				'address'    =>'La providencia',
				'created_at' => new Datetime,
				'updated_at' => new Datetime
           ],
           [
				'name'       => 'Juan',
				'last_name'  => 'Pérez',
				'email'      => 'juan@gmail.com',
				'user'       => 'juan',
				'password'   => \Hash::make('1234'),
				'type'       =>'user',
				'active'     => 1,
				'address'    =>'El socorro',
				'created_at' => new Datetime,
				'updated_at' => new Datetime
           ],
       	); 

       	User::insert($data);  
    }
}
