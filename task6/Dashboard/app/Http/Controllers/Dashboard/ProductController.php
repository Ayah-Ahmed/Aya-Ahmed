<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Services\Media;

class ProductController extends Controller
{
    public const STATUSES = ['Not Active', 'Active'];
    public const MAX_UPLOAD_SIZE  = 1024;
    public const AVAILABLE_EXTENSIONS  = ['png', 'jpg', 'jpeg'];
    public function index()
    {
        // SELECT * => get()
        $products = DB::table('products')->get();;
        // convert $product into associative array
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $brands = DB::table('brands')->select('id', 'name_en', 'name_ar')->get();
        $subcategories = DB::table('sub_categories')->select('id', 'name_en', 'name_ar')->get();

        return view('products.create', compact('brands', 'subcategories'))->with('statues', self::STATUSES);
    }

    public function store(StoreProductRequest $request)
    {

        $data = $request->validated();

        $data['image'] = Media::upload($request->file('image'), 'products');
        DB::table('products')->insert($data);

        return $this->redirectAccordingToRequest($request, "Product Created Successfully");
    }



    public function edit($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        $brands = DB::table('brands')->select('id', 'name_en', 'name_ar')->get();
        $subcategories = DB::table('sub_categories')->select('id', 'name_en', 'name_ar')->get();
        return view('products.edit', compact('product', 'brands', 'subcategories'))->with('statues', self::STATUSES);
    }



    public function update(UpdateProductRequest $request, $id)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {

            $data['image'] = Media::upload($request->file('image'), 'products');
            $product = DB::table('products')->where('id', $id)->first();

            Media::delete($product->image, 'products');
        }

        DB::table('products')->where('id', $id)->update($data);

        return $this->redirectAccordingToRequest($request, "Product Updated Successfully");
    }


    public function destroy($id)
    {
        $product = DB::table('products')->where('id', $id)->first();
        Media::delete($product->image, 'products');
        DB::table('products')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Product deleted Successfully');
    }
}