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
            // 'size' => 'like',
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

    //Hiển thị sản phẩm thuộc Nike ra giao diện khách hàng
    public function showNikeHome() {
        $brandName = 'Nike';
    
        $data = Product::query()
            ->whereHas('getBrand', function ($query) use ($brandName) {
                $query->where('brand_name', $brandName);
            })->paginate(8); // Chia thành các trang nếu cần
            
        $brands = Brand::all();  // Truy vấn tất cả các thương hiệu

        $newProduct = Product::query()->orderBy('created_at', 'desc')->take(9)->get();;

        return view('index', [
            'products' => $data,
            'brands' => $brands,  
            'newProduct' => $newProduct,
        ]);
    }

    //Function hiển thị tất cả các product trong trang Feature
    public function showFeature()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $data = Product::query()->paginate(8); // Lấy tất cả sản phẩm

        return view('home.feature', [
            'products' => $data,
            'brands' => $brands,
            'categories' => $categories,
        ]);
    }

    //Function hiển thị tất cả các product có giới tính là Men trong trang Men
    public function showMenProducts()
    {
        $gender = 'Men';
        $brands = Brand::all();
        $categories = Category::all();
        $data = Product::query()
            ->where('gender', $gender)
            ->paginate(8);

        return view('home.men_products', [
            'products' => $data,
            'brands' => $brands,
            'categories' => $categories,
        ]);
    }

    //Function hiển thị tất cả các product có giới tính là Women trong trang Women
    public function showWomenProducts()
    {
        $gender = 'Women';
        $brands = Brand::all();
        $categories = Category::all();
        $data = Product::query()
            ->where('gender', $gender)
            ->paginate(8);

        return view('home.women_products', [
            'products' => $data,
            'brands' => $brands,
            'categories' => $categories,
        ]);
    }

    public function showKidProducts()
    {
        $genders = ['Kid Boy', 'Kid', 'Kid Girl'];
        $brands = Brand::all();
        $categories = Category::all();
        $data = Product::query()
            ->whereIn('gender', $genders)
            ->paginate(8);

        return view('home.kid_products', [
            'products' => $data,
            'brands' => $brands,
            'categories' => $categories,
        ]);
    }

    //Function hiển thị tất cả các product theo brand
    public function showProductsByBrand($brand_id)
    {
        $brand = Brand::findOrFail($brand_id);

        $categories = Category::all();

        $data = Product::query()
            ->whereHas('getBrand', function ($query) use ($brand) {
                $query->where('brand_id', $brand->brand_id);
            })->paginate(8);

        return view('home.by_brand', [
            'products' => $data,
            'brand' => $brand,
            'categories' => $categories,

        ]);
    }

    public function create()
    {
        $brands = Brand::all(); 
        $categories = Category::all(); 
        return view('admin.products.create', compact('brands', 'categories'));
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

    // Display Detail Product in homePage
    public function showDetailProduct($product_id)
    {
        $product = Product::with('getBrand', 'getCategory', 'getProductAttributes')->find($product_id);

        // Load related attributes (sizes)
        $sizes = $product->getProductAttributes;

        return view('home.show', [
            'product' => $product,
            'sizes' => $sizes,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $brands = Brand::all(); 
        $categories = Category::all(); 
    
        return view('admin.products.update', compact('product', 'brands', 'categories'));
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

    //function search
    public function search(Request $request)
    {
        $keywords = $request->input('keywords');

        // Xử lý tìm kiếm dựa trên keywords, ví dụ:
        $results = Product::where('product_name', 'like', '%' . $keywords . '%')->orWhereHas('getProduct', function ($innerQuery) use ($keywords) {
            $innerQuery->where('brand_name', 'like', '%' . $keywords . '%');
        })
        ->paginate(9);

        return view('search_results', ['results' => $results, 'keywords' => $keywords]);
    }
}
