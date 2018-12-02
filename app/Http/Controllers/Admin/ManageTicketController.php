<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Tickets;
use App\Category;
use App\Brand;

class ManageTicketController extends Controller
{
    public function index()
    {
    	return view('admin.ticket.index');
    }

    public function TicketDatatables()
    {
    	$ticket = Tickets::select('id','source','destination','price','stock','takeoff_date','kode_tkt')->get();
    	return Datatables::of($ticket)
    					->addColumn('action','admin.ticket.action')
                        ->editColumn('price',function(Tickets $ticket){
                            return "IDR ".str_replace(",", ".",number_format($ticket->price));
                        })->make(true);
    }

    public function TicketAdd()
    {
        $category = Category::all();
        return view('admin.ticket.add',['category' => $category]);
    }

    public function store(Request $request)
    {
        $price_format = array(".","IDR"," ");
        $kode_tkt = ("TKT".rand(0,1000));
        $id = $request->get('id');
        if ($id) {
            $ticket = Tickets::findOrFail($id);
        }else{
            $ticket = new Tickets;
            
        }
        if ($request->get('kode')) {
            $ticket->kode_tkt = $request->get('kode');
        }else{
            $ticket->kode_tkt = $kode_tkt;
        }
        $ticket->source   = $request->get('source');
        $ticket->destination = $request->get('destination');
        $ticket->category_id = $request->get('category_id');
        $ticket->image       = $request->get('image');
        $ticket->desc        = $request->get('desc');
        $ticket->price       = str_replace($price_format,"",$request->price);
        $ticket->stock       = $request->get('stock');
        $ticket->takeoff_date = $request->get('takeoff_date');
        $ticket->takeoff_time = $request->get('takeoff_time_submit');
        $ticket->save();
        return redirect()->route('admin.manage-ticket')->with('status','Data tiket berhasil disimpan');
    }

    public function TicketShow($id)
    {
        $ticket = Tickets::findOrFail($id);
        $category = Category::all();
        $show = true;
        return view('admin.ticket.edit',
            [
                'ticket'   => $ticket,
                'show'     => $show,
                'category' => $category,
            ]
        );
    }

    public function TicketEdit($id)
    {
        $ticket = Tickets::findOrFail($id);
        $category = Category::all();
        $show = false;
        return view('admin.ticket.edit',
            [
                'ticket'   => $ticket,
                'show'     => $show,
                'category' => $category,
            ]
        );
    }
}
