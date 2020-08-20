<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sale;
use App\SaleItem;
use App\Customer;
use App\Product;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sale::all();

        foreach ($sales as $sale) {
            $sale->items = SaleItem::where('sale_id', $sale->id)->get();
            $sale->customer = Customer::where('id', $sale->customer_id)->first();

            foreach($sale->items as $item){
                $item->description = Product::where('id', $item->product_id)->first()->description;
            }
        }

        return view('sale.index', compact('sales'));
    }

    public function create()
    {

        $customers = Customer::all();
        $products = Product::all();

        return view('sale.create', compact('customers', 'products'));
    }

    public function process(Request $request)
    {
        $customer_id = $request->input('customer_id');

        $products = Product::whereIn('id', $request->input('products'))->get();

        $totalPrice = 0;

        foreach ($products as $product) {
            $product->quantity = $request->input('quantityProduct'.$product->id);
            $totalPrice += $product->quantity * $product->price;
        }

        return view('sale.finish', compact('products', 'totalPrice', 'customer_id'));
    }

    public function store(Request $request)
    {

        //Atualizar quantidade em estoque do produto

        $productsJSON = $request->input('products');

        $totalPrice = $request->input('totalPrice');

        $customer_id = $request->input('customer_id');

        $products = json_decode($productsJSON[0]);

        $sale = Sale::create([
            'customer_id' => $customer_id,
            'totalPrice' => $totalPrice
        ]);

        $saleItems = [];

        foreach ($products as $productInRequest) {
            $product = Product::findOrFail($productInRequest->id);

            $product->available = $productInRequest->available - $productInRequest->quantity;

            $product->save();

            array_push($saleItems ,SaleItem::create([
                'product_id' => $product->id,
                'sale_id' => $sale->id,
                'productPrice' => $product->price,
                'soldQuantity' => $productInRequest->quantity
            ]));

        }
        
        return redirect()->route('sales');
    }

}
