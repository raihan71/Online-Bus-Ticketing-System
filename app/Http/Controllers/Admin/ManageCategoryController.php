<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Yajra\Datatables\Datatables;

class ManageCategoryController extends Controller
{
    public function index()
    {
    	return view('admin.category.index');
    }

    public function CategoryDatatables()
    {
    	$category = Category::all();

    	return Datatables::of($category)
    					 ->addColumn('action','admin.category.action')->make(true);
    }

    public function CategoryEdit($id)
    {
    	$category = Category::findOrFail(urldecode(base64_decode($id)));
    	$show = false;
    	return view('admin.category.edit',['category' => $category,'show' => $show]);
    }

    public function CategoryShow($id)
    {
    	$category = Category::findOrFail(urldecode(base64_decode($id)));
    	$show = true;
    	return view('admin.category.edit',['category' => $category,'show' => $show]);
    }

    public function CategoryCreate()
    {
    	return view('admin.category.add');
    }

    public function store(Request $request)
    {
        $icon = '';
    	$category = new Category;
    	$category->type = $request->get('type');
    	$category->desc = $request->get('desc');
        switch ($category->type) {
            case 'Pesawat':
                $icon = 'fa-plane';
                break;
            case 'Kereta':
                $icon = 'fa-train';
                break;
            case 'Bus':
                $icon = 'fa-bus';
                break;
            case 'Roket':
                $icon = 'fa-rocket';
                break;
            case 'Pesawat ulang alik':
                $icon = 'fa-space-shuttle';
                break;
            case 'Kapal':
                $icon = 'fa-ship';
                break;
            default:
                # code...
                break;
        }
        $category->icon = $icon;
    	$category->save();

    	return redirect()->route('admin.manage-category')->with('status','Data kategori berhasil disimpan');
    }

    public function delete($id)
    {
        $ticket = Category::where('id',$id)->delete();
        return redirect()->route('admin.manage-ticket')->with('status','Data berhasil dihapus');
    }
}
