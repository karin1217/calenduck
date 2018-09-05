<?php

namespace App\Http\Controllers\Admin\Products;

use App\Models\ProductAttributeName;
use App\Models\ProductAttributeValue;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AttributesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(ProductCategory $category)
    {
        if( ! Auth::user()->can('manage_products') )
        {
            return redirect()->route('root');
        }

        $productAttributeNames = ProductAttributeName::where('category_id', $category->id)->with('values')->get();

        $categories = [];

        if($productAttributeNames) {
            foreach (ProductCategory::all() as $key => $pCategory) {
                if ($pCategory->parent_id == 0) {
                    $categories[$pCategory->id]['main'] = $pCategory;
                } else {
                    $categories[$pCategory->parent_id]['sub'][] = $pCategory;
                }

            }
        }

        $currentCategory = $category;

//        print_r($categories);exit;

        return view('admin.products.attributes.index', compact('productAttributeNames', 'categories', 'currentCategory'));
    }


    public function create(Request $request)
    {
        if( ! Auth::user()->can('manage_products') )
        {
            return json_encode(['status'=>'failed', 'msg'=>'Access denied!']);
        }
        //return json_encode($request->toArray());

        $categoryId = $request->category_id;

        if($request->type == 'value') {
            $id = ProductAttributeValue::insertGetId(['name_id'=>$request->name_id]);
        }else{
            $id = ProductAttributeName::insertGetId(['category_id'=>$categoryId, 'parent_id'=>0]);
        }

        if( ! $id ){
            return json_encode(['status'=>'failed', 'msg'=>'Data insert error']);
        }

        return json_encode(['status'=>'success', 'msg'=>'Data inserted successfully', 'id'=>$id]);
    }

    public function update(Request $request)
    {
        if( ! Auth::user()->can('manage_products') )
        {
            return json_encode(['status'=>'failed', 'msg'=>'Access denied!']);
        }

        if( isset($request->name) ) {
            if (!trim($request->name)) {
                return json_encode(['status' => 'failed', 'msg' => 'Name is required']);
            }

            if( ProductAttributeName::where('id',$request->id)->update(['name'=>trim($request->name)]) ) {
                return json_encode(['status'=>'success', 'msg'=>'Update successfully']);
            }
        }
        if( isset($request->value) ) {
            if(!trim($request->value)) {
                return json_encode(['status' => 'failed', 'msg' => 'Value is required']);
            }

            if( ProductAttributeValue::where('id',$request->id)->update(['value'=>trim($request->value)]) ) {
                return json_encode(['status'=>'success', 'msg'=>'Update successfully']);
            }
        }



        return json_encode(['status'=>'failed', 'msg'=>'Update failed']);
    }

    public function delete(ProductCategoryRequest $request)
    {
        if( ! Auth::user()->can('manage_products') )
        {
            return json_encode(['status'=>'failed', 'msg'=>'Access denied!']);
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
