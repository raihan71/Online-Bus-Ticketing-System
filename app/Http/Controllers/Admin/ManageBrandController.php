<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Brand;
use Yajra\Datatables\Datatables;

class ManageBrandController extends Controller
{
	public function index()
	{
		return view('admin.brand.index');
	}

	public function BrandDatatables()
	{
		$brand = Brand::all();

		return Datatables::of($brand)
		->addColumn('action','admin.brand.action')
		->make(true);
	}

	public function BrandAdd()
	{
		return view('admin.brand.add');
	}

	public function store(Request $request)
	{
		$brand = new Brand;
		$brand->name = $request->get('name');
		$brand->image = $request->get('image');
		$brand->save();
		return redirect()->route('admin.manage-brand')->with('status','Data brand berhasil dibuat');
	}

	public function BrandEdit($id)
	{
		$brand = Brand::findOrFail(urldecode(base64_decode($id)));
		$show = false;
		return view('admin.brand.edit',['brand' => $brand,'show' => $show]);
	}

	public function BrandShow($id)
	{
		$brand = Brand::findOrFail(urldecode(base64_decode($id)));
		$show = true;
		return view('admin.brand.edit',['brand' => $brand,'show' => $show]);
	}

}
