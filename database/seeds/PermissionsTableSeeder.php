<?php

use Illuminate\Database\Seeder;

use App\Permission;
use App\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('permissions')->truncate();

        //Cases Permissions

        // Show all Case 
    	$CaseIncedent_index = new Permission();
    	$CaseIncedent_index->name = 'CaseIncedent_index';
    	$CaseIncedent_index->save();


    	// Create case
    	$CaseIncedent_create = new Permission();
    	$CaseIncedent_create->name = 'CaseIncedent_create';
    	$CaseIncedent_create->save();

    	// Store create case
    	$CaseIncedent_store = new Permission();
    	$CaseIncedent_store->name = 'CaseIncedent_store';
    	$CaseIncedent_store->save();


    	// Show case Details
    	$CaseIncedent_show = new Permission();
    	$CaseIncedent_show->name = 'CaseIncedent_show';
    	$CaseIncedent_show->save();



    	// Edit / Update Case
    	$CaseIncedent_edit = new Permission();
    	$CaseIncedent_edit->name = 'CaseIncedent_edit';
    	$CaseIncedent_edit->save();


    	$CaseIncedent_update = new Permission();
    	$CaseIncedent_update->name = 'CaseIncedent_update';
    	$CaseIncedent_update->save();



    	// Destory/ Delete case
    	$CaseIncedent_destroy = new Permission();
    	$CaseIncedent_destroy->name = 'CaseIncedent_destroy';
    	$CaseIncedent_destroy->save();


    	// Help Desk Case Update
    	$CaseIncedent_CaseInfoUpdateHd = new Permission();
    	$CaseIncedent_CaseInfoUpdateHd->name = 'CaseIncedent_CaseInfoUpdateHd';
    	$CaseIncedent_CaseInfoUpdateHd->save();

    	// Fact Finding Case Update
    	$CaseIncedent_CaseInfoUpdateFF = new Permission();
    	$CaseIncedent_CaseInfoUpdateFF->name = 'CaseIncedent_CaseInfoUpdateFF';
    	$CaseIncedent_CaseInfoUpdateFF->save();

    	// Admin Case Update
    	$CaseIncedent_CaseInfoUpdateAdmin = new Permission();
    	$CaseIncedent_CaseInfoUpdateAdmin->name = 'CaseIncedent_CaseInfoUpdateAdmin';
    	$CaseIncedent_CaseInfoUpdateAdmin->save();


    	// mark as open case
    	$CaseIncedent_CaseChangeStatus = new Permission();
    	$CaseIncedent_CaseChangeStatus->name = 'CaseIncedent_CaseChangeStatus';
    	$CaseIncedent_CaseChangeStatus->save();

    	// mark as archive case
    	$CaseIncedent_CaseChangeStatusAdmin = new Permission();
    	$CaseIncedent_CaseChangeStatusAdmin->name = 'CaseIncedent_CaseChangeStatusAdmin';
    	$CaseIncedent_CaseChangeStatusAdmin->save();

   
    	
    	// Users Permissions

    	// show all users
    	$Users_index = new Permission();
    	$Users_index->name = 'Users_index';
    	$Users_index->save();

    	// Add/create users
    	$Users_create = new Permission();
    	$Users_create->name = 'Users_create';
    	$Users_create->save();

    	// User update
    	$Users_store = new Permission();
    	$Users_store->name = 'Users_store';
    	$Users_store->save();

    	// Edit user self
    	$Users_edit = new Permission();
    	$Users_edit->name = 'Users_edit';
    	$Users_edit->save();


    	// Update Edited user
    	$Users_update = new Permission();
    	$Users_update->name = 'Users_update';
    	$Users_update->save();


    	// show Individual user
    	$Users_show = new Permission();
    	$Users_show->name = 'Users_show';
    	$Users_show->save();


    	// delete or deactive user
    	$Users_destroy = new Permission();
    	$Users_destroy->name = 'Users_destroy';
    	$Users_destroy->save();


    	// Settings page

    	// show settings page
    	$Settings_index = new Permission();
    	$Settings_index->name = 'Settings_index';
    	$Settings_index->save();




    	// Attach Permission to Roles
    	$super_admin = Role::whereName('super_admin')->first();
    	$admin = Role::whereName('admin')->first();
    	$fact_finding = Role::whereName('fact_finding')->first();
    	$help_desk = Role::whereName('help_desk')->first();
    	$field_agent = Role::whereName('field_agent')->first();



    	// Detach Role
    	$all_permissions = [
    		$CaseIncedent_store,
    		$CaseIncedent_index,
    		$CaseIncedent_CaseChangeStatus,
    		$CaseIncedent_CaseChangeStatusAdmin,
    		$CaseIncedent_create,
    		$CaseIncedent_CaseInfoUpdateAdmin,
    		$CaseIncedent_CaseInfoUpdateFF,
    		$CaseIncedent_CaseInfoUpdateHd,
    		$CaseIncedent_update,
    		$CaseIncedent_destroy,
    		$CaseIncedent_show,
    		$CaseIncedent_edit,
    		$Users_store,
    		$Users_index,
    		$Users_create,
    		$Users_destroy,
    		$Users_update,
    		$Users_show,
    		$Users_edit,
    		$Settings_index
    	];

    	$super_admin->detachPermissions($all_permissions);
    	$admin->detachPermissions($all_permissions);
    	$fact_finding->detachPermissions($all_permissions);
    	$help_desk->detachPermissions($all_permissions);
    	$field_agent->detachPermissions($all_permissions);

    	

    	// Attach role
    	$super_admin->attachPermissions([
    		$CaseIncedent_index,
    		$CaseIncedent_create,
    		$CaseIncedent_store,
    		$CaseIncedent_edit,
    		$CaseIncedent_update,
    		$CaseIncedent_show,
    		$CaseIncedent_destroy,
    		$CaseIncedent_CaseInfoUpdateHd,
    		$CaseIncedent_CaseInfoUpdateFF,
    		$CaseIncedent_CaseInfoUpdateAdmin,
    		$CaseIncedent_CaseChangeStatus,
    		$CaseIncedent_CaseChangeStatusAdmin,

    		// users
    		$Users_index,
    		$Users_create,
    		$Users_store,
    		$Users_edit,
    		$Users_update,
    		$Users_show,
    		$Users_destroy,

    		// Settings
    		$Settings_index,

    	]);

    	$admin->attachPermissions([
    		$CaseIncedent_index,
    		$CaseIncedent_create,
    		$CaseIncedent_store,
    		$CaseIncedent_edit,
    		$CaseIncedent_update,
    		$CaseIncedent_show,
    		$CaseIncedent_destroy,
    		//$CaseIncedent_CaseInfoUpdateHd,
    		//$CaseIncedent_CaseInfoUpdateFF,
    		$CaseIncedent_CaseInfoUpdateAdmin,
    		//$CaseIncedent_CaseChangeStatus,
    		$CaseIncedent_CaseChangeStatusAdmin,

    		// users
    		$Users_index,
    		$Users_create,
    		$Users_store,
    		$Users_edit,
    		$Users_update,
    		$Users_show,
    		$Users_destroy,

    		// Settings
    		$Settings_index,

    	]);

    	$fact_finding->attachPermissions([
    		$CaseIncedent_index,
    		//$CaseIncedent_create,
    		//$CaseIncedent_store,
    		$CaseIncedent_edit,
    		$CaseIncedent_update,
    		$CaseIncedent_show,
    		//$CaseIncedent_destroy,
    		//$CaseIncedent_CaseInfoUpdateHd,
    		$CaseIncedent_CaseInfoUpdateFF,
    		//$CaseIncedent_CaseInfoUpdateAdmin,
    		$CaseIncedent_CaseChangeStatus,
    		//$CaseIncedent_CaseChangeStatusAdmin,

    		// users
    		//$Users_index,
    		//$Users_create,
    		//$Users_store,
    		//$Users_edit,
    		//$Users_update,
    		//$Users_show,
    		//$Users_destroy,

    		// Settings
    		//$Settings_index,
    	]);

    	$help_desk->attachPermissions([
    		$CaseIncedent_index,
    		//$CaseIncedent_create,
    		//$CaseIncedent_store,
    		$CaseIncedent_edit,
    		$CaseIncedent_update,
    		$CaseIncedent_show,
    		//$CaseIncedent_destroy,
    		$CaseIncedent_CaseInfoUpdateHd,
    		//$CaseIncedent_CaseInfoUpdateFF,
    		//$CaseIncedent_CaseInfoUpdateAdmin,
    		$CaseIncedent_CaseChangeStatus,
    		//$CaseIncedent_CaseChangeStatusAdmin,

    		// users
    		// $Users_index,
    		// $Users_create,
    		// $Users_store,
    		// $Users_edit,
    		// $Users_update,
    		// $Users_show,
    		// $Users_destroy,

    		// Settings
    		//$Settings_index,
    	]);

    	$field_agent->attachPermissions([
    		$CaseIncedent_index,
    		$CaseIncedent_create,
    		$CaseIncedent_store,
    		//$CaseIncedent_edit,
    		//$CaseIncedent_update,
    		$CaseIncedent_show,
    		//$CaseIncedent_destroy,
    		//$CaseIncedent_CaseInfoUpdateHd,
    		//$CaseIncedent_CaseInfoUpdateFF,
    		//$CaseIncedent_CaseInfoUpdateAdmin,
    		//$CaseIncedent_CaseChangeStatus,
    		//$CaseIncedent_CaseChangeStatusAdmin,

    		// users
    		// $Users_index,
    		// $Users_create,
    		// $Users_store,
    		// $Users_edit,
    		// $Users_update,
    		// $Users_show,
    		// $Users_destroy,

    		// Settings
    		//$Settings_index,
    	]);

    }
}
