<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Tickets;
use App\Reservation;
use Auth;

class TicketController extends Controller
{
    public function cari(Request $request)
    {
        $category = Category::all();
    	return view('user.ticket.cari_ticket',['category' => $category]);
    }

    public function viewAll(Request $request)
    {
        $id = $request->get('category_id');
        $category = null;
        if ($id) {
            $category = Category::findOrFail($id);
            $ticket = Tickets::with('category')->where('category_id',$id)->paginate(8);
        }else{
            $category = 'semua';
            $ticket = Tickets::paginate(8);
        }
    	return view('user.ticket.view_all',['ticket' => $ticket,'category' => $category, 'id' => $id]);
    }

    public function show(Request $request)
    {
    	return view('user.ticket.show');
    }

    public function myTicket($id)
    {
        $order = Reservation::findOrFail($id);
        $ticket = Tickets::where('id',$order->ticket_id)->first();
    	return view('user.ticket.my_ticket',['order' => $order,'ticket' => $ticket]);
    }

    public function viewAllTicket(Request $request)
    {
        $ticket = Reservation::with('ticket')->where('user_id','=',Auth::id())->get();
    	return view('user.ticket.my_ticket_all',['ticket' => $ticket]);
    }
}
