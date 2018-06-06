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
    	$Ticket_index = new Permission();
    	$Ticket_index->name = 'Ticket_index';
    	$Ticket_index->save();


    	// Create case
    	$Ticket_create = new Permission();
    	$Ticket_create->name = 'Ticket_create';
    	$Ticket_create->save();

    	// Store create case
    	$Ticket_store = new Permission();
    	$Ticket_store->name = 'Ticket_store';
    	$Ticket_store->save();


    	// Show case Details
    	$Ticket_show = new Permission();
    	$Ticket_show->name = 'Ticket_show';
    	$Ticket_show->save();



    	// Edit / Update Case
    	$Ticket_edit = new Permission();
    	$Ticket_edit->name = 'Ticket_edit';
    	$Ticket_edit->save();


    	$Ticket_update = new Permission();
    	$Ticket_update->name = 'Ticket_update';
    	$Ticket_update->save();



    	// Destory/ Delete case
    	$Ticket_destroy = new Permission();
    	$Ticket_destroy->name = 'Ticket_destroy';
    	$Ticket_destroy->save();

    	// mark as open case
    	$Ticket_TicketChangeStatus = new Permission();
    	$Ticket_TicketChangeStatus->name = 'Ticket_TicketChangeStatus';
    	$Ticket_TicketChangeStatus->save();

    	// mark as archive case
    	$Ticket_TicketChangeStatusManager = new Permission();
    	$Ticket_TicketChangeStatusManager->name = 'Ticket_TicketChangeStatusManager';
    	$Ticket_TicketChangeStatusManager->save();

   
    	
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
    	$admin = Role::whereName('admin')->first();
    	$manager = Role::whereName('manager')->first();
    	$engineer = Role::whereName('engineer')->first();
    	$client = Role::whereName('client')->first();



    	// Detach Role
    	$all_permissions = [
    		$Ticket_store,
    		$Ticket_index,
    		$Ticket_TicketChangeStatus,
    		$Ticket_TicketChangeStatusManager,
    		$Ticket_create,
    		$Ticket_update,
    		$Ticket_destroy,
    		$Ticket_show,
    		$Ticket_edit,
    		$Users_store,
    		$Users_index,
    		$Users_create,
    		$Users_destroy,
    		$Users_update,
    		$Users_show,
    		$Users_edit,
    		$Settings_index
    	];

    	$admin->detachPermissions($all_permissions);
		$manager->detachPermissions($all_permissions);
		$engineer->detachPermissions($all_permissions);
    	$client->detachPermissions($all_permissions);

    	

    	// Attach role
    	$admin->attachPermissions([
    		$Ticket_index,
    		$Ticket_create,
    		$Ticket_store,
    		$Ticket_edit,
    		$Ticket_update,
    		$Ticket_show,
    		$Ticket_destroy,
    		$Ticket_TicketChangeStatus,
    		$Ticket_TicketChangeStatusManager,

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

    	$manager->attachPermissions([
    		$Ticket_index,
    		//$Ticket_create,
    		//$Ticket_store,
    		//$Ticket_edit,
    		//$Ticket_update,
    		$Ticket_show,
    		//$Ticket_destroy,
    		//$Ticket_TicketChangeStatus,
    		$Ticket_TicketChangeStatusManager,

    		// users
    		$Users_index,
    		// $Users_create,
    		// $Users_store,
    		// $Users_edit,
    		// $Users_update,
    		$Users_show,
    		//$Users_destroy,

    		// Settings
    		$Settings_index,

    	]);

    	$engineer->attachPermissions([
    		$Ticket_index,
    		//$Ticket_create,
    		//$Ticket_store,
    		//$Ticket_edit,
    		//$Ticket_update,
    		$Ticket_show,
    		//$Ticket_destroy,
    		$Ticket_TicketChangeStatus,
    		//$Ticket_TicketChangeStatusManager,

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

    	$client->attachPermissions([
    		$Ticket_index,
    		$Ticket_create,
    		$Ticket_store,
    		$Ticket_edit,
    		$Ticket_update,
    		$Ticket_show,
    		//$Ticket_destroy,
    		// $Ticket_TicketChangeStatus,
    		//$Ticket_TicketChangeStatusManager,

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
