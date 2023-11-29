<?php

namespace App\Http\Controllers;

use App\Models\Shoes;
use App\Http\Requests\Shoes\StoreShoesRequest;
use App\Http\Requests\Shoes\UpdateShoesRequest;

class ShoesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShoesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Shoes $shoes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shoes $shoes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShoesRequest $request, Shoes $shoes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shoes $shoes)
    {
        //
    }
}
