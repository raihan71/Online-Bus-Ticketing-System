<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Tickets;
use App\Category;
use App\Reservation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Reservation::with('user')->where('user_id',Auth::user()->id)->count();
        return view('user.home',
            [
                'order' => $order,
            ]
        );
    }

    public function adminIndex()
    {
        $user   = User::where('is_admin',false)->count();
        $ticket = Tickets::count();
        $order  = Reservation::count();
        return view('admin.home',
            [
                'user'   => $user,
                'ticket' => $ticket,
                'order'  => $order,
            ]
        );
    }
}
