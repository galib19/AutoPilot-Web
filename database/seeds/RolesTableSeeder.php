<?php

use Illuminate\Database\Seeder;

use App\Role;
use App\User;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('roles')->truncate();

        //Create super manager role
        $admin = new Role();
        $admin->name = 'admin';
        $admin->display_name = 'Admin';
        $admin->save();


        //Create manager role
        $manager = new Role();
        $manager->name = 'manager';
        $manager->display_name = 'Manager';
        $manager->save();

        //Create Fact Finding role
        $engineer = new Role();
        $engineer->name = 'engineer';
        $engineer->display_name = 'Engineer';
        $engineer->save();


        // //Create Fact Finding role
        // $help_desk = new Role();
        // $help_desk->name = 'help_desk';
        // $help_desk->display_name = 'Help Desk';
        // $help_desk->save();


        //Create Field Agent role
        $client = new Role();
        $client->name = 'client';
        $client->display_name = 'Client';
        $client->save();


        // Attach Role for super manager
        $user1 = User::find(1);
        $user1->detachRole($admin);
        $user1->attachRole($admin);


        // Attach Role for manager
        $user2 = User::find(2);
        $user2->detachRole($manager);
        $user2->attachRole($manager);

        // Attach Role for Field agent
        $user3 = User::find(3);
        $user3->detachRole($client);
        $user3->attachRole($client);


        // Attach Role for Help desk team
        $user4 = User::find(4);
        $user4->detachRole($engineer);
        $user4->attachRole($engineer);

        // Attach Role for Fact finding team
        $user5 = User::find(5);
        $user5->detachRole($engineer);
        $user5->attachRole($engineer);


    }
}
