<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
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

        $startIndex = ($data->currentPage() - 1) * $data->perPage() + 1;

        return view('admin.categories.index' , [
            'categories' => $data,
            'keywords' => $lastKeyword,
            'column' => $column,
            'startIndex' => $startIndex,  // Pass the starting index to the view

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
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();

        $result = Category::query()->create($data);
        if ($result) {
            return redirect()->route('categories.index')->with('success', 'Create Successfull!');
        }
        return redirect()->route('categories.index')->with('error', 'Create Error!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->fill($request->validated());
        if ($category->save()) {
            return redirect()->route('categories.index')->with('success', 'Update category Successfull!');
        }
        return redirect()->route('categories.index')->with('error', 'Update category Error!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($category_id)
    {
        $result = Category::query()->where('category_id', $category_id)->delete();
        if ($result) {
            return redirect()->route('categories.index')->with('success', 'Delete Category Successfull!');
        }
        return redirect()->route('categories.index')->with('error', 'Delete Category Error!');
    }
}
