<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Location;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $request->validate([
            'brands' => 'nullable|array|min:0',
            'brands.*' => 'nullable|integer|min:1',
            'locations' => 'nullable|array|min:0',
            'locations.*' => 'nullable|integer|min:1',
            'color' => 'nullable|integer|min:0',
            'sort' => 'nullable|string|in:new-to-old,old-to-new,low-to-high,high-to-low',
            'page' => 'nullable|integer|min:1',
            'perPage' => 'nullable|integer|in:15,30,60,120',
        ]);

        $f_brands = $request->has('brands') ? $request->brands : [];
        $f_locations = $request->has('locations') ? $request->locations : [];
        $f_color = $request->has('color') ? $request->color : 0;
        $f_sort = $request->has('sort') ? $request->sort : null;
        $f_page = $request->has('page') ? $request->page : 1;
        $f_perPage = $request->has('perPage') ? $request->perPage : 15;

        $products = Product::when($f_brands, function ($query) use ($f_brands) {
            $query->whereIn('brand_id', $f_brands);
        })
            ->when($f_locations, function ($query) use ($f_locations) {
                $query->whereIn('location_id', $f_locations);
            })
            ->when($f_color, function ($query) use ($f_color) {
                $query->where('color_id', $f_color);
            })
            ->with('brand', 'location', 'color')
            ->when(isset($f_sort), function ($query) use ($f_sort) {
                if ($f_sort == 'old-to-new') {
                    $query->orderBy('id');
                } elseif ($f_sort == 'high-to-low') {
                    $query->orderBy('price', 'desc');
                } elseif ($f_sort == 'low-to-high') {
                    $query->orderBy('price');
                } else {
                    $query->orderBy('id', 'desc');
                }
            }, function ($query) {
                $query->orderBy('id', 'desc');
            })
            ->paginate($f_perPage, ['*'], 'page', $f_page)
            ->withQueryString();

        $brands = Brand::orderBy('name')
            ->get();
        $locations = Location::orderBy('name')
            ->get();
        $colors = Color::orderBy('name')
            ->get();

        return view('product.index')
            ->with([
                'products' => $products,
                'brands' => $brands,
                'locations' => $locations,
                'colors' => $colors,
                'f_brands' => $f_brands,
                'f_locations' => $f_locations,
                'f_color' => $f_color,
                'f_sort' => $f_sort,
                'f_perPage' => $f_perPage,
            ]);
    }


    public function show($id)
    {
        $product = Product::when(!auth()->check(), function ($query) {
        })
            ->with('brand', 'location',  'color')
            ->findOrFail($id);

        $similar = Product::where('brand_id', $product->brand->id)
            ->where('location_id', $product->location->id)
            ->with('brand', 'location', 'color')
            ->take(4)
            ->get();

        return view('product.show')
            ->with([
                'product' => $product,
                'similar' => $similar,
            ]);
    }
}
