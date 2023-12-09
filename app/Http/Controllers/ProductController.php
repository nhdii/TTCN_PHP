<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchColumns = [
            'product_name' => 'like',
            'gender' => 'like',
            'size' => 'like',
        ];
        $column = $request->get('search_by');
        $keywords = $request->get('keywords');
        $lastKeyword = $keywords;
        $query = Product::query();

        $query->leftJoin('brands', 'products.brand_id', '=', 'brands.brand_id')
            ->leftJoin('categories', 'products.category_id', '=', 'categories.category_id')
            ->select('products.*', 'brands.brand_name', 'categories.category_name');

        if (array_key_exists($column, $searchColumns)) {
            $operator = $searchColumns[$column];
            if (!empty($keywords)) {
                if ($operator === 'like') {
                    $keywords = '%' . $keywords . '%';
                }
                $query->where($column, $operator, $keywords);
            }
        }

        $data = $query->paginate(5);

        return view('admin.products.index' , [
            'products' => $data,
            'keywords' => $lastKeyword,
            'column' => $column,
        ]);
    }

    public function homeIndex() {
        $brandName = 'Nike';

        $data = Product::query()
        ->whereHas('getBrand', function ($query) use ($brandName) {
            $query->where('brand_name', $brandName);
        })->paginate(9);
        
        return view('index', [
            'products' => $data,
        ]);
    }

    public function create()
    {
        $brands = Brand::all(); 
        $categories = Category::all(); 

        //list size product
        $sizes = ['EU 35.5', 'EU 36', 'EU 36.5', 'EU 37', 'EU 37.5', 'EU 38', 'EU 38.5', 
        'EU 39', 'EU 39.5', 'EU 40', 'EU 40.5', 'EU 41', 'EU 41.5', 'EU 42', 'EU 42.5', 'EU 43'];

        return view('admin.products.create', compact('brands', 'categories', 'sizes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'image' . '.' . $image->getClientOriginalExtension();
            $data['image'] = $imageName;
        }
        $result = Product::query()->create($data);
        if ($result) {
            return redirect()->route('products.index')->with('success', 'Product Created Successfull!');
        }
        return redirect()->route('products.index')->with('error', 'Create Error!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.products.detail', compact('product'));
    }

    // //Display Detail Product in homePage
    // public function showHome($product_id)
    // {
    //     $product = DB::table('products')
    //         ->join('ves', 'products.product_id', '=', 'ves.product_id')
    //         ->where('products.product_id', $product_id)
    //         ->get();
    //     if ($product) {
    //         return view('show', [
    //             'dich_vu' => $product,
    //         ]);
    //     } else {
    //         abort(404);
    //     }
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $brands = Brand::all(); 
        $categories = Category::all(); 
        
        //list size product
        $sizes = ['EU 35.5', 'EU 36', 'EU 36.5', 'EU 37', 'EU 37.5', 'EU 38', 'EU 38.5', 
        'EU 39', 'EU 39.5', 'EU 40', 'EU 40.5', 'EU 41', 'EU 41.5', 'EU 42', 'EU 42.5', 'EU 43'];

        return view('admin.products.update', compact('product', 'sizes', 'brands', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->fill($request->validated());

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $proId = $product['product_id'];
            $imageName = 'image' . '.' . $image->getClientOriginalExtension();
            $image->storeAs("public/images/product-images/$proId", $imageName);
            $product['image'] = $imageName;
        }
        if ($product->save()) {
            return redirect()->route('products.index')->with('success', 'Edit Product Successful!');
        }
        return redirect()->route('products.index')->with('error', 'Edit Error!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($product_id)
    {
        $result = Product::query()->where('product_id', $product_id)->delete();
        if ($result) {
            return redirect()->route('products.index')->with('success', 'Product Deleted Successfull!');
        }
        return redirect()->route('products.index')->with('error', 'Deleted Error!');
    }
}
