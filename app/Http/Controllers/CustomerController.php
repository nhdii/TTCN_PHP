<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\Customer\StoreCustomerRequest;
use App\Http\Requests\Customer\UpdateCustomerRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $searchColumns = [
            'gender' => 'like',
            'fullname' => 'like',
            'address' => 'like'
        ];
        $column = $request->get('search_by');
        $keywords = $request->get('keywords');
        $lastKeyword = $keywords;
        $query = Customer::query();

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
        return view('admin.customers.index' , [
            'customers' => $data,
            'keywords' => $lastKeyword,
            'column' => $column,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $imageName = 'avatar' . '.' . $image->getClientOriginalExtension();
            $data['avatar'] = $imageName;
        }
        $result = Customer::query()->create($data);
        if ($result) {
            return redirect()->route('customers.index')->with('success', 'Create Successfull!');
        }
        return redirect()->route('customers.index')->with('error', 'Create Error!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return view('admin.customers.detail', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('admin.customers.update', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer->fill($request->validated());

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $userId = $customer['customer_id'];
            $imageName = 'avatar' . '.' . $image->getClientOriginalExtension();
            $image->storeAs("public/images/user_avt/$userId", $imageName);
            $customer['avatar'] = $imageName;
        }
        if ($customer->save()) {
            return redirect()->route('customers.index')->with('success', 'Edit Customer Successful!');
        }
        return redirect()->route('customers.index')->with('error', 'Edit Error!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($customer_id)
    {
        $result = Customer::query()->where('customer_id', $customer_id)->delete();
        if ($result) {
            return redirect()->route('customers.index')->with('success', 'Khách hàng đã được xóa thành công!');
        }
        return redirect()->route('customers.index')->with('error', 'Không tìm thấy khách hàng để xoá!');
    }
}
