<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;


class SearchController extends Controller
{
    public function search(Request $request)
    {
        $keywords = $request->input('keywords');

        // Xử lý tìm kiếm dựa trên keywords, ví dụ:
        $results = Product::where('product_name', 'like', '%' . $keywords . '%')->orWhereHas('getBrand', function ($innerQuery) use ($keywords) {
            $innerQuery->where('brand_name', 'like', '%' . $keywords . '%');
        })
        ->orWhereHas('getCategory', function ($innerQuery) use ($keywords) {
            $innerQuery->where('category_name', 'like', '%' . $keywords . '%');
        })
        ->paginate(12);

        return view('search_results', ['results' => $results, 'keywords' => $keywords]);
    }

    public function searchSuggestions(Request $request)
    {
        $keyword = $request->input('keyword');

        $products = Product::where('product_name', 'like', "%$keyword%")
            ->orWhereHas('getBrand', function ($query) use ($keyword) {
                $query->where('brand_name', 'like', "%$keyword%");
            })
            ->orWhereHas('getCategory', function ($query) use ($keyword) {
                $query->where('category_name', 'like', "%$keyword%");
            })
            ->get();

        return response()->json($products);
    }
}
