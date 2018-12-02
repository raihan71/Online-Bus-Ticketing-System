<?php

namespace App\Http\Controllers;

use Twilio\Rest\Client;
use Illuminate\Http\Request;
use App\Ticket;
use App\Bus;
use Auth;
use Twilio;


class TicketController extends Controller
{
    //
    public function book($id){
    	$bus = Bus::where('id', $id)->get();
    	//

    	$ticket = new Ticket;
    	$ticket->busID = $id;
    	$ticket->uID = Auth::id();
    	$ticket->name = request('name');
    	$ticket->phone = request('phone');
    	$ticket->email = request('email');
        $ticket->seats = request('seats');

    	foreach($bus as $bus){
    	$number = $bus->availability;
    	if($number<1){
    		$available = 0;
    	}
    	else{
    		$available = 1;
            $number = $number - request('seats');
	    	//$number--;
	    	$bus->availability = $number;
	    	$bus->save();
    	}

        $ticket->booking_date = date("Y-m-d");

    	$ticket->travel_date = $bus->date;
    	
    	}
    	$ticket->save();

    	return view('tickets.booked')->with(compact('ticket', 'bus', 'available'));
    }

    public function all(){
        $id = Auth::user()->id;
        $tickets = Ticket::where('uID', $id)->get();
    	return view('tickets.all')->with(compact('tickets'));
    }

    public function view($id){
        $ticket = new Ticket;
        $ticket = Ticket::where('id', $id)->get();
        foreach($ticket as $ticket){
            $bus = Bus::where('id', $ticket->busID)->get();
        }
        foreach ($bus as $bus) {
            $travel = 0;
            $present = date("Y-m-d");
            if (strtotime($present) <= strtotime($ticket->travel_date)) {
                $travel = 1;
            }
        }
        return view('tickets.view')->with(compact('ticket', 'bus', 'travel'));
    }

    public function cancel($id){
        $ticket = Ticket::where('id', $id)->get();
        foreach($ticket as $ticket){
            $bus = Bus::where('id', $ticket->busID)->get();
        }
        foreach ($bus as $bus) {
            $travel = 0;
            $present = date("Y-m-d");
            if (strtotime($present) <= strtotime($ticket->travel_date)) {
                $travel = 1;
            }
        }
        return view('tickets.validate')->with(compact('ticket', 'bus'));
    }

    public function cancelled($id){
        Ticket::where('id', $id)->delete();
        return view('tickets.cancelled');
    }
}
