<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Http\Requests\Brand\StoreBrandRequest;
use App\Http\Requests\Brand\UpdateBrandRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchColumns = [
            'brand_name' => 'like',
            'brand_id' => 'like',
        ];
        $column = $request->get('search_by');
        $keywords = $request->get('keywords');
        $lastKeyword = $keywords;
        $query = Brand::query();
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
        return view('admin.brands.index' , [
            'brands' => $data,
            'keywords' => $lastKeyword,
            'column' => $column,
        ]);
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(StoreBrandRequest $request)
    {
        $data = $request->validated();

        $result = Brand::query()->create($data);
        if ($result) {
            return redirect()->route('brands.index')->with('success', 'Brand Created Successfull!');
        }
        return redirect()->route('brands.index')->with('error', 'Create Error!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', [
            'brand' => $brand,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        $brand->fill($request->validated());
        if ($brand->save()) {
            return redirect()->route('brands.index')->with('success', 'Update Brand Successfull!');
        }
        return redirect()->route('brands.index')->with('error', 'Update Brand Error!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($brand_id)
    {
        $result = Brand::query()->where('brand_id', $brand_id)->delete();
        if ($result) {
            return redirect()->route('brands.index')->with('success', 'Brand Deleted Successfull!');
        }
        return redirect()->route('brands.index')->with('error', 'Delete Brand Error!');
    }
}
