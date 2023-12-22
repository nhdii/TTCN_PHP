<?php

namespace App\Http\Controllers;

use App\Models\DetailOrder;
use App\Models\Product;
use App\Models\Order;
use App\Models\Customer;
use App\Models\User;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileUserController extends Controller
{
    public function showProfile(Request $request){
        if(Auth::user()->admin == 1){
            $user = User::find(auth()->id());
            return view('profile.profile', [
                'user' => $user,
                'name' => $user->name,
                'gender' => '',
                'member' => 'Admin',
            ]);
        }
        else{
            $user = Customer::where('email', $request->user()->email)->first();
            $order_histories = Order::where('customer_id', $user->customer_id)->get();
            $detail_order = DetailOrder::all();
            $brand = Brand::all();
            $product = Product::all();
            $category = Category::all();

            return view('profile.profile', [
                'user' => $user,
                'name' => $user->fullName,
                'gender' => $user->gender,
                'member' => 'Thành viên',
                'order_histories' => $order_histories,
                'detail_orders' => $detail_order,
                'brands' => $brand,
                'products' => $product,
                'categories' => $category,
            ]);
        }
    }
    public function edit(Request $request){
        if(Auth::user()->admin == 1){
            $user = User::find(auth()->id());
            return view('profile.edit', [
                'user' => $user,
                'name' => $user->name,
                'gender' => '',
                'member' => 'Admin',
            ]);
        }
        else{
            $user = Customer::where('email', $request->user()->email)->first();
            return view('profile.edit', [
                'user' => $user,
                'name' => $user->fullName,
                'gender' => $user->gender,
                'member' => 'Thành viên'
            ]);
        }
    }
    public function update(Request $request){
        if($request->has('submit')){
            $customer = Customer::where('email', $request->user()->email)->first();
            $customer->fullName = $request->fullName;
            $customer->address = $request->address;
            $customer->phone = $request->phone;
            $customer->birthDay = $request->birthDay;
            $customer->gender = $request->gender;
            if ($request->hasFile('avatar')) {
                $image = $request->file('avatar');
                $userId = $customer->customer_id;
                $imageName = 'avatar' . '.' . $image->getClientOriginalExtension();
                $image->storeAs("public/images/user_avt/$userId", $imageName);
                $customer->avatar = $imageName;
            }

            $customer->save();

            $user = User::find(\auth()->id());
            $user->name = $request->fullName;
            $user->save();

            return redirect()->route('show-profile')->with('update-success', 'Cập nhật thành công!');
        }
        else{
            return redirect()->route('show-profile');
        }
    }
}
