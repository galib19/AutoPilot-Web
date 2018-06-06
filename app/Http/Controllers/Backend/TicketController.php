<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Ticket;
use App\Site;
use App\AsfOption;
use App\User;
use App\UserMeta;
use Illuminate\Support\Facades\View;
use Intervention\Image\Facades\Image;
//use Illuminate\Http\UploadedFile;
//use Illuminate\Support\Facades\Storage;
use File;
use Validator;
use Illuminate\Support\Facades\Auth;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;

use App\Notifications\Controllers\FcmNotificationsController;

use App\Http\Controllers\Backend\UploadController as UploadFile;


class TicketController extends BackendController
{

	protected $limit = 10;
	protected $ticket_status = 'new';
	protected $ticket_type = 'others';
	protected $vendor_name = 'UCE';
	protected $pg_owner = 'Vigor Vendor PG';

    public function index()
    {
        //
    	$tickets = Ticket::orderBy('id', 'DESC')->with('user')->latest()->paginate($this->limit);
		$user = Auth::guard('web')->user();

        return view('backend.ticket.index',compact('tickets','user'))->with('i', (request()->input('page', 1) - 1) * 5);
        //return view('backend.ticket.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Ticket $tickets)
    {
    	//$tickets = new Ticket();

        return view('backend.ticket.create', compact('tickets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\TicketRequest $request)
    {


		$data = $this->handleRequest($request);
		
		$site = Site::with('ticket')->find($data['site_id']);

		if(!$site) 
		{
			return redirect()->route('backend.ticket.create')->with('message', 'Invalid Site ID!');
		}

		$data['ticket_status'] = $this->ticket_status;

		$data['vendor_name'] = $this->vendor_name;

		$data['pg_owner'] = $this->pg_owner;

		$tt_number = $data['vendor_name'].'_'.$data['ticket_type'].'_TT_'.$site->zone.'_1';

		$data['ticket_number'] = $tt_number;


    	$data = $request->user()->tickets()->create($data);

    	return redirect()->route('backend.ticket.index')->with('message', 'Your Ticket was submitted for review!');

    }


    private function handleRequest($request)
    {

		$data['site_id'] = $request->input('site_id');
		$data['ticket_type'] = $request->input('ticket_type');
		$data['raised_time'] = date('Y-m-d H:i:s', strtotime($request->input('raised_time')));
		

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$tickets = Ticket::with('user')->find($id);
		$site = Site::with('ticket')->find($tickets->site_id);
		
		$users =  User::all();

		$assigned_engineer_id = $tickets->assigned_engineer_id; 
		$assigned_engineer = null; 
		$assigned_engineer = User::find($assigned_engineer_id);


		return View::make('backend.ticket.show', ['site' => $site, 'assigned_engineer' => $assigned_engineer, 
												  'users' => $users, 'tickets' => $tickets]);
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$tickets = Ticket::findOrFail($id);
        $tickets = Ticket::with('user')->findOrFail($id);

        return View::make('backend.ticket.edit', ['tickets' => $tickets]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\TicketRequest $request, $id)
    {
        $ticket     = Ticket::findOrFail($id);
        //$oldImage = $ticket->image;
        $data     = $this->handleRequest($request);
        $ticket->update($data);

        return redirect()->route('backend.ticket.index')->with('message', 'Your Ticket was updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ticket::findOrFail($id)->delete();

        //return redirect('/backend/blog')->with('trash-message', ['Your post moved to Trash', $id]);
        return redirect()->route('backend.ticket.index')->with('message', 'Your Case was Deleted!');
    }

    // Case incident change status
    public function TicketChangeStatus(Request $request, $ticket_id){

    	if ( empty($ticket_id) ) {
    		return;
		}

    	$tickets = Ticket::findOrFail($ticket_id);

		$user_id = $tickets->user_id;
		
		$user = Auth::guard('web')->user();

    	switch ( $request->input('ticket_status_action') ) {
    		case 'failed':

				$user->free = 1;
			    $user->eta = date('2000-01-01');
				$user->ert = 0;
				
				$user->save();
				
				$tickets->ticket_status = 'failed';

    			$tickets->save();

    			FcmNotificationsController::fcmSingleNotification($user_id, 'Case Cancelled/Failed', $tickets->site_id);

    			break;

			case 'in-progress':

				 
				$eta = date('Y-m-d H:i:s', strtotime($request->input('eta')));
				// $ert = $request->input('ert');
				
				$user->eta = $eta;
				$user->ert = $request->input('ert');
				$user->free = 0; 

				$user->save();
				
    			$tickets->ticket_status = 'in-progress';

    			$tickets->save();

    			FcmNotificationsController::fcmSingleNotification($user_id, 'Case In-progress', $tickets->site_id);

				break;
			
			case 'completed':		

				$user->free = 1;
			    $user->eta = date('2000-01-01');
				$user->ert = 0;
				
				$user->save();
				
			    $tickets->ticket_status = 'completed';

    			$tickets->save();

    			FcmNotificationsController::fcmSingleNotification($user_id, 'Case Completed', $tickets->site_id);


    		default:
    			
    			break;
    	}

    	return redirect('backend/ticket/'.$ticket_id)->with('success-message', 'Case status has been updated');
    	
    }


    // Case incident change status by manager 
    public function TicketChangeStatusManager(Request $request, $ticket_id){

    	if ( empty($ticket_id) ) {
    		return;
    	}

		$tickets = Ticket::findOrFail($ticket_id);
		
    	$user_id = $tickets->user_id;

    	switch ( $request->input('ticket_status_action') ) {
			case 'acknowledged':

    			$tickets->ticket_status = 'acknowledged';

    			$tickets->save();

    			FcmNotificationsController::fcmSingleNotification($user_id, 'Case Acknowledged', $tickets->site_id);

				break;
				
			case 'assigned':

				$tickets->assigned_engineer_id = $request->input('assigned_engineer');

				// $user = User::find($tickets->assigned_engineer_id);

				// $user->free = 0;
				
				// $user->save();

    			$tickets->ticket_status = 'assigned';

    			$tickets->save();

    			FcmNotificationsController::fcmSingleNotification($user_id, 'Case Approved', $tickets->site_id);

				break;

			case 'archieved':
				
				
				if($tickets->ticket_status == "in-progress") 
				{
					$engineer = User::find($tickets->assigned_engineer_id);

					$engineer->free = 1;
					$engineer->eta = date('2000-01-01');
					$engineer->ert = 0;
					
					$engineer->save();		
				}
				
				
				$tickets->ticket_status = 'archieved';

				$tickets->save();
    			FcmNotificationsController::fcmSingleNotification($user_id, 'Case Archieved', $tickets->site_id);

				break;

			case 'unarchieved':

    			$tickets->ticket_status = 'new';

    			$tickets->save();

    			FcmNotificationsController::fcmSingleNotification($user_id, 'Case Again Opened', $tickets->site_id);

				break;	

    		default:
    			
    			break;
    	}


    	return redirect('backend/ticket/'.$ticket_id)->with('success-message', 'Ticket status has been updated');
    	
    }



}
