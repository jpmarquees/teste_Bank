<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

use App\Product;
use App\SaleItem;




class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }


    public function edit ($productId) {
        $product = Product::findOrFail($productId);

        return view('product.edit', compact('product'));
    }

    public function get()
    {
        $products = Product::all();

        return $products;
    }

    public function post(ProductRequest $request)
    {
        $product = Product::create([
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'available' => $request->input('available'),
        ]);

        return redirect()->route('products');
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->all());

        return redirect()->route('products');
    }

    public function delete (Product $product){
        if(SaleItem::where('product_id', $product->id)->get()->isEmpty()){
            $product->delete();
        } else {
            throw new \Exception('É impossível excluir esse produto pois ele está ligado a um item de venda.');
        }


        return redirect()->route('products');
    }
}
