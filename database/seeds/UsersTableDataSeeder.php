<?php

use Illuminate\Database\Seeder;

class UsersTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

    	DB::table('users')->insert([
            [
            	'name' => 'Admin',
            	'phone' => '01612345678',
            	'email' => 'r.chowdhury@brainstation-23.com',
            	'password' => bcrypt('123456789'),
            	'active' => 1
            ],
            [
            	'name' => 'Raihan',
            	'phone' => '01712345678',
            	'email' => 'raihan@info.com',
            	'password' => bcrypt('123456789'),
            	'active' => 1
            ],
            [
            	'name' => 'Tarun',
            	'phone' => '01812345678',
            	'email' => 'tarun@info.com',
            	'password' => bcrypt('123456789'),
            	'active' => 1
            ],
            [
            	'name' => 'Shishir',
            	'phone' => '01912345678',
            	'email' => 'shishir@info.com',
            	'password' => bcrypt('123456789'),
            	'active' => 1
            ],
            [
            	'name' => 'Nizam',
            	'phone' => '01512345678',
            	'email' => 'nizam@info.com',
            	'password' => bcrypt('123456789'),
            	'active' => 1
            ],

        ]);    	
    	
    }
}
