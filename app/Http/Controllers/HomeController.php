<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $brands = Category::withCount ('brands')
            ->orderBy('products_count', 'desc')
            ->take(7)
            ->get();

        $brandProducts = [];
        foreach ($brands as $brand){
            $brandProducts[] = [
                'brand' => $brand,
                'products' => product::where('brand_id', $brand->id)
                    ->with('brand')
                    ->take(7)
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
