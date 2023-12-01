<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\Categories\StoreCategoriesRequest;
use App\Http\Requests\Categories\UpdateCategoriesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchColumns = [
            'category_id' => 'like',
            'category_name' => 'like',
        ];
        $column = $request->get('search_by');
        $keywords = $request->get('keywords');
        $lastKeyword = $keywords;
        $query = Category::query();
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
        return view('admin.categories.index' , [
            'categories' => $data,
            'keywords' => $lastKeyword,
            'column' => $column,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoriesRequest $request)
    {
        $data = $request->validated();

        $result = Categories::query()->create($data);
        if ($result) {
            return redirect()->route('categories.index')->with('success', 'Create Successfull!');
        }
        return redirect()->route('categories.index')->with('error', 'Create Error!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($categories)
    {
        dd($categories);
        return view('admin.categories.edit', [
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoriesRequest $request, Categories $categories)
    {
        $categories->fill($request->validated());
        if ($categories->save()) {
            return redirect()->route('categories.index')->with('success', 'Update category Successfull!');
        }
        return redirect()->route('categories.index')->with('error', 'Update category Error!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($category_id)
    {
        $result = Categories::query()->where('category_id', $category_id)->delete();
        if ($result) {
            return redirect()->route('categories.index')->with('success', 'Delete Category Successfull!');
        }
        return redirect()->route('categories.index')->with('error', 'Delete Category Error!');
    }
}
