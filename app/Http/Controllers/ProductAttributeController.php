<?php

namespace App\Http\Controllers;

use App\Models\ProductAttribute;
use App\Models\Product;
use App\Models\Type;
use App\Http\Requests\ProductAttribute\StoreProductAttributeRequest;
use App\Http\Requests\ProductAttribute\UpdateProductAttributeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchColumns = [
            'product_id' => 'like',
        ];
        $column = $request->get('search_by');
        $keywords = $request->get('keywords');
        $lastKeyword = $keywords;
        $query = ProductAttribute::query();
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
        return view('admin.product_attributes.index' , [
            'product_attributes' => $data,
            'keywords' => $lastKeyword,
            'column' => $column,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        $products = Product::all(); 
        $types = Type::all();

        //list size product
        $sizes = ['EU 35.5', 'EU 36', 'EU 36.5', 'EU 37', 'EU 37.5', 'EU 38', 'EU 38.5', 
        'EU 39', 'EU 39.5', 'EU 40', 'EU 40.5', 'EU 41', 'EU 41.5', 'EU 42', 'EU 42.5', 'EU 43'];

        return view('admin.product_attributes.create', compact('sizes', 'products', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductAttributeRequest $request)
    {
        $data = $request->validated();
        
        $result = ProductAttribute::query()->create($data);
        if ($result) {
            return redirect()->route('product_attributes.index')->with('success', 'Product Created Successfull!');
        }
        return redirect()->route('product_attributes.index')->with('error', 'Create Error!');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductAttribute $productAttribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductAttribute $productAttribute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductAttributeRequest $request, ProductAttribute $productAttribute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($attribute_id)
    {
        $result = ProductAttribute::query()->where('attribute_id', $attribute_id)->delete();
        if ($result) {
            return redirect()->route('product_attributes.index')->with('success', 'Product Deleted Successfull!');
        }
        return redirect()->route('product_attributes.index')->with('error', 'Deleted Error!');
    }
}
