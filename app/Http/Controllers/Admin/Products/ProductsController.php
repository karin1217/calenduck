<?php

namespace App\Http\Controllers\Admin\Products;

use App\Handlers\ImageUploadHandler;
use App\Models\Product;
use App\Models\ProductAttributeName;
use App\Models\ProductCategory;
use App\Models\ProductSku;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     *
     * 列出指定分类下的商品列表
     *
     * @param ProductCategory $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     *
     */
    public function index(ProductCategory $category)
    {
        if( ! Auth::user()->can('manage_products') )
        {
            return redirect()->route('root');
        }

        $imgManager = new ImageManager(array('driver' => 'imagick'));
        //dd($imgManager);
        // create Image from file
        $img = $imgManager->make(public_path().'/images/main/pic8.jpg');
        //dd($img);
        $img->blur(15);

        header('Content-Type: image/jpg');
        echo $img->encode('jpg');

        $products = Product::where('category_id',$category->id)->get();

        $categories = [];

        foreach (ProductCategory::all() as $key => $pCategory) {
            if ($pCategory->parent_id == 0) {
                $categories[$pCategory->id]['main'] = $pCategory;
            } else {
                $categories[$pCategory->parent_id]['sub'][] = $pCategory;
            }
        }

        $currentCategory = $category;

        return view('admin.products.index', compact('products','categories','currentCategory'));
    }

    /**
     * 编缉商品页面
     *
     * @param Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     *
     */
    public function edit(Product $product, ProductCategory $category=NULL)
    {
        if( ! Auth::user()->can('manage_products') )
        {
            return redirect()->route('root');
        }

        // 获取所有分类
        $categories = [];
        foreach (ProductCategory::all() as $key => $pCategory) {
            if ($pCategory->parent_id == 0) {
                $categories[$pCategory->id]['main'] = $pCategory;
            } else {
                $categories[$pCategory->parent_id]['sub'][] = $pCategory;
            }
        }

        $currentCategory = ($category) ? $category : $product->category;

        //var_dump($currentCategory);
        // 获取属性名和属性值
        $attributes = ProductAttributeName::where('category_id',$currentCategory->id)->with('values')->get();

//        var_dump($attributes);
        $skuIds = [];
        //if( ! $category ) {
        foreach ($product->productSkus as $key => $productSku) {
            //var_dump($productSku);
            foreach (explode('|', $productSku->sku) as $sku) {
                $skuIds[] = $sku;
            }
        }
        $skuIds = array_unique($skuIds);
        //}

        return view('admin.products.edit', compact('product', 'attributes','skuIds','categories','currentCategory'));
    }


    public function update(Request $request, Product $product)
    {
        if( ! Auth::user()->can('manage_products') ) {
            return redirect()->route('root');
        }



        // 验证请求
        $this->validate($request, [
            'name'      =>  'required|min:3|max:50',
        //'password'  =>  'nullable|min:6|confirmed'
        ]);

        // 更新数据
        $data = [];
        $data['name'] = $request->name;
        $data['introduction'] = $request->introduction;
//        if( $request->password ) // 判断是否更新密码
//        {
//            $data['password'] = bcrypt($request->password);
//        }
        $product->update($data);

//        $user->update($request->all());

        // 更新成功的提示消息闪存至 Session
//        session()->flash('success', trans('pages.user.edit.message.success'));
        // 跳转回用户简介页面
        //return redirect()->route('users.show', $user->id)->with('success', trans('pages.user.edit.message.success'));
        return view('admin.products.edit', compact('product'));
    }

    public function uploadImage(Request $request, Product $product)
    {
        //var_dump($product);exit;

        if( ! Auth::user()->can('manage_products') )
        {
            return [
                'code'      =>  CODE_REQUEST_STATUS_FAILED,
                'status'    =>  MSG_REQUEST_FAILED,
                'data'      =>  json_decode(json_encode('{}')),
            ];
        }

        $imgHandler = ImageUploadHandler::getInstance();

        // 参数顺序：图片文件、要存储的文件夹名、图片名称前缀(2为商品图片)
        $handlerResult = $imgHandler->save($request->image, 'products', 2);

        if( ! $handlerResult ) {
            return [
                'code'      =>  101,
                'status'    =>  '图片保存失败',
                'data'      =>  json_decode(json_encode('{}')),
            ];
        } else {
            $product->image = $handlerResult['path'];
            $product->save();
            return [
                'code'      =>  CODE_REQUEST_STATUS_SUCCESS,
                'status'    =>  MSG_REQUEST_SUCCESS,
                'data'      =>  $handlerResult,
            ];
        }

    }


}
