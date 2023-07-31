<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $brands = Brand::withCount ('products')
            ->orderBy('products_count', 'desc')
            ->take(7)
            ->get();

        $brandProducts = [];
        foreach ($brands as $brand){
            $brandProducts[] = [
                'brand' => $brand,
                'products' => product::where('brand_id', $brand->id)
                    ->with('brand')
                    ->take(8)
                    ->get(),
            ];
        }

        return view('home.index')
            ->with([
                'brandProducts' => $brandProducts,
            ]);
    }

    public function details($id){
        $product = Product::find($id);
        return view('product.show',['product' => $product]);
    }
}
