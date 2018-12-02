<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\User;

class ManageMemberController extends Controller
{
    public function index()
    {
    	return view('admin.member.index');	
    }

    public function MemberDatatables()
    {
		$user = User::where('is_admin',false)->select('name AS fullname','email','id','address','phone')->get();
		return Datatables::of($user)->addColumn('action','admin.member.action')->make(true);
    }

    public function MemberCreate()
    {
    	return view('admin.member.add');
    }

    public function store(Request $request)
    {
    	$id = $request->get('id');
    	if ($id) {
    		$user = User::findOrFail($id);
    	}else{
    		$user = new User;
    	}
    		$user->name  = $request->get('name');
    		$user->email = $request->get('email');
    		$user->address = $request->get('address');
    		$user->phone = $request->get('phone');
    		$user->save();
    	return redirect()->route('admin.manage-member')->with('status','Data member berhasil disimpan');
    }

    public function MemberEdit($id)
    {
    	$user = User::findOrFail($id);
    	$show = false;
    	return view('admin.member.edit',['user' => $user,'show' => $show]);
    }

    public function MemberShow($id)
    {
    	$user = User::findOrFail($id);
    	$show = true;
    	return view('admin.member.edit',['user' => $user,'show' => $show]);
    }
}
