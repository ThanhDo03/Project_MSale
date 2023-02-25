<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;

class ProductController extends Controller
{
    // Upload Product
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {
            $product = DB::table('product')
                ->where('product_name', $request->name_product)
                ->first();
            if (!$product) {
                $newProdcuct = new Product();
                $newProdcuct->product_name = $request->name_product;
                $newProdcuct->product_producer = $request->brand_product;
                $newProdcuct->product_price = $request->price_product;
                $name = $request->file('image_product')->getClientOriginalName();
                $request->file('image_product')->move(public_path('image/Product'), $name);
                $newProdcuct->product_image = $name;
                $newProdcuct->product_amount = $request->amount_product;
                $newProdcuct->Staff = $request->staff;
                $newProdcuct->Status = $request->status_product;
                $newProdcuct->product_des = $request->des_product;
                $newProdcuct->save();
                $products = Product::all();
                return redirect()
                    ->route('home.admin', compact('products'))
                    ->with('message', 'Create product success!');
            } else {
                return redirect()
                    ->route('upload.Product')
                    ->with('error2', 'Product exist!');
            }
        }
    }

    // Update Product
    public function edit($id)
    {
        $product_edit = Product::find($id);
        return view('admin.edit_product', ['product' => $product_edit]);
    }

    public function update(Request $request)
    {
        if ($request->isMethod('POST')) {
            $product_edit = Product::find($request->id);
            if ($product_edit != null) {
                $product_edit->product_name = $request->name_product;
                $product_edit->product_producer = $request->brand_product;
                $product_edit->product_price = $request->price_product;
                if ($request->file('image_product')) {
                    $name = $request->file('image_product')->getClientOriginalName();
                    $request->file('image_product')->move(public_path('image/Product'), $name);
                    $product_edit->product_image = $name;
                }
                $product_edit->product_amount = $request->amount_product;
                $product_edit->Staff = $request->staff;
                $product_edit->Status = $request->status_product;
                $product_edit->product_des = $request->des_product;
                $product_edit->save();
                $products = Product::all();
                return redirect()
                    ->route('home.admin', compact('products'))
                    ->with('success', 'Product updated successfully!');
            }
        }
    }

    // Delete Product
    public function delete($id)
    {
        $product_delete = Product::find($id);
        $product_delete->delete();
        return redirect()
            ->route('home.admin')
            ->with('success', 'Product deleted successfully');
    }
}
