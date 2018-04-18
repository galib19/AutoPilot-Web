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

        //Create super admin role
        $super_admin = new Role();
        $super_admin->name = 'super_admin';
        $super_admin->display_name = 'Super Admin';
        $super_admin->save();


        //Create admin role
        $admin = new Role();
        $admin->name = 'admin';
        $admin->display_name = 'Admin';
        $admin->save();

        //Create Fact Finding role
        $fact_finding = new Role();
        $fact_finding->name = 'fact_finding';
        $fact_finding->display_name = 'Fact Finding';
        $fact_finding->save();


        //Create Fact Finding role
        $help_desk = new Role();
        $help_desk->name = 'help_desk';
        $help_desk->display_name = 'Help Desk';
        $help_desk->save();


        //Create Field Agent role
        $field_agent = new Role();
        $field_agent->name = 'field_agent';
        $field_agent->display_name = 'Field Agent';
        $field_agent->save();


        // Attach Role for super admin
        $user1 = User::find(1);
        $user1->detachRole($super_admin);
        $user1->attachRole($super_admin);


        // Attach Role for admin
        $user2 = User::find(2);
        $user2->detachRole($admin);
        $user2->attachRole($admin);

        // Attach Role for Field agent
        $user3 = User::find(3);
        $user3->detachRole($field_agent);
        $user3->attachRole($field_agent);


        // Attach Role for Help desk team
        $user4 = User::find(4);
        $user4->detachRole($help_desk);
        $user4->attachRole($help_desk);

        // Attach Role for Fact finding team
        $user5 = User::find(5);
        $user5->detachRole($fact_finding);
        $user5->attachRole($fact_finding);


    }
}
