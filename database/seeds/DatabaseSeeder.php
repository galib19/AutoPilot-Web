<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Eloquent::unguard();

		//disable foreign key check for this connection before running seeders
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');


        $this->call(UsersTableDataSeeder::class);
        //$this->call(TicketsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);

        // To only apply to a single connection and reset it's self
		// explicitly undo what I've done for clarity
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
