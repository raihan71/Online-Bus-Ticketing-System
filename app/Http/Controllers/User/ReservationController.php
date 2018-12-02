<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tickets;
use App\Reservation;
use Auth;

class ReservationController extends Controller
{
    public function book($id)
    {	
    	$ticket = Tickets::findOrFail($id);
        $kode_trx = ("TRX".rand(0,1000));
    	$order = new Reservation;
        $order->kode_trx = $kode_trx;
    	$order->ticket_id = $id;
    	$order->user_id   = Auth::id();
    	$order->name 	  = request('name');
    	$order->email 	  = request('email');
    	$order->phone 	  = request('phone');
    	$order->qty 	  = request('qty');
    	$order->cost 	  = $order->qty*$ticket->price;

    	foreach ($ticket as $key => $data) {
    		$stock = $ticket->stock;
    		if ($stock<1) {
    			$tersedia = 0;
    		}else{
    			$tersedia = 1;
    			$stock = $stock - request('qty');
    			$ticket->stock = $stock;
    			$ticket->save();
    		}
    	}
    	$order->booking_date = date('y-m-d');
    	$order->travel_date = $ticket->takeoff_date;
    	$order->save();

    	return redirect()->route('user.my-ticket.all')->with('status','Data berhasil disimpan');
    }

    public function view($id)
    {
    	$ticket = Tickets::findOrFail($id);
    	return view('user.reservation.reserve')->with('ticket',$ticket);
    }
}
