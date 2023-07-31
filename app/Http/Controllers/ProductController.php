<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request){
        $request->validate([
            'brand' => 'nullable|integer|min:0',
            'sort' => 'nullable|string|in:new-to-old,old-to-new,low-to-high,high-to-low',
            'page' => 'nullable|integer|min:1',
            'perPage' => 'nullable|integer|in:15,30,60,120'
        ]);

        $f_brands = $request->has('brands') ? $request->brands : [];
        $f_sort = $request->has('sort') ? $request->sort : null;
        $f_page = $request->has('page') ? $request->page : 1;
        $f_perPage = $request->has('perPage') ? $request->perPage : 15;

        $products = Brand::when($f_brands, function ($query) use ($f_brands){
            $query->whereIn('brand_id',$f_brands);
        })
            ->with('brand')
            ->when(isset($f_sort), function ($query) use ($f_sort) {
                if ($f_sort == 'old-to-new') {
                    $query->orderBy('id');
                } elseif ($f_sort == 'high-to-low'){
                    $query->orderBy('price','desc');
                } elseif ($f_sort == 'low-to-high'){
                    $query->orderBy('price');
                } else {
                    $query->orderBy('id','desc');
                }
            }, function ($query) {
                $query->orderBy('id', 'desc');
            })
            ->paginate($f_perPage,['*'], 'page', $f_page)
            ->withQueryString();

        return view('product.index')
            ->with([
                'products' => $products,
                'brands' => $f_brands,
                'f_brands' => $f_brands,
                'f_sort' => $f_sort,
                'f_perPage' => $f_perPage,
            ]);
    }
}
