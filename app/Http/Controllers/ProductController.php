<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function store(Request $request){
        if ($request->isMethod('POST')){
            $photo = DB::table('product')->where('product_id', $request->id_product)->first();
            if (!$photo){
                $newProdcuct = new Product();
                $newProdcuct->product_id = $request->id_product;
                $newProdcuct->product_name = $request->name_product;
                $newProdcuct->product_producer = $request->brand_product;
                $newProdcuct->product_price = $request->price_product;
                $name = $request->file('image_product')->getClientOriginalName();
                $request->file('image_product')->move(public_path('image/Product'), $name);
                $newProdcuct->product_image = $name;
                $newProdcuct->product_warehouse = $request->whouse_product;
                $newProdcuct->product_type = $request->type_product;
                $newProdcuct->product_des = $request->des_product;
                $newProdcuct->save();
                $products = Product::all();
                return redirect()->route('home.admin', compact('products'))->with('message', 'Create product success!');
            }else{
                return redirect()->route('upload.Product')->with('error2', 'Product exist!');
            }
        }
    }
}
