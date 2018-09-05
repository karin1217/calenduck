<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductCategoryRequest;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class ProductCategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(ProductCategory $productCategory)
    {
        if( ! Auth::user()->can('manage_products') )
        {
            return redirect()->route('root');
        }

        return view('admin.products.categories.index', compact('productCategory'));
    }

    public function create(ProductCategoryRequest $request)
    {
        if( ! Auth::user()->can('manage_products') )
        {
            return redirect()->route('root');
        }
        //return json_encode($request->toArray());

        $id = ProductCategory::insertGetId($request->toArray());

        if( ! $id ){
            return json_encode(['status'=>'failed', 'msg'=>'Data insert error']);
        }

        return json_encode(['status'=>'success', 'msg'=>'Data inserted successfully', 'id'=>$id]);
    }

    public function update(ProductCategoryRequest $request)
    {
        if( ! Auth::user()->can('manage_products') )
        {
            return redirect()->route('root');
        }

        if( ! trim($request->name) ) {
            return json_encode(['status'=>'failed', 'msg'=>'Name is required']);
        }

        if( ProductCategory::where('id',$request->id)->update(['name'=>trim($request->name)]) ) {
            return json_encode(['status'=>'success', 'msg'=>'Update successfully']);
        }

        return json_encode(['status'=>'failed', 'msg'=>'Update failed']);
    }

    public function delete(ProductCategoryRequest $request)
    {
        if( ! Auth::user()->can('manage_products') )
        {
            return redirect()->route('root');
        }

        if( ! trim($request->id) || ! is_numeric($request->id) ) {
            return json_encode(['status'=>'failed', 'msg'=>'The ID must be a number.']);
        }

        if($request->type == 'top') {
            ProductCategory::where('parent_id',$request->id)->delete();
        }

        if( ProductCategory::where('id',$request->id)->delete() ) {
            return json_encode(['status'=>'success', 'msg'=>'Delete successfully']);
        }

        return json_encode(['status'=>'failed', 'msg'=>'Delete failed']);


    }
}
