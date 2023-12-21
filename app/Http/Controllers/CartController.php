<?php

namespace App\Http\Controllers;

use App\Models\DetailOrder;
use App\Models\Product;
use App\Models\Order;
use App\Models\Customer;
use App\Models\ProductAttribute;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Models\Invoice;
use Illuminate\Support\Facades\Redirect;
use Mail;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);

        return view('cart.index', compact('cart'));
    }

    public function addToCart(Request $request)
    {
        // Lấy thông tin sản phẩm từ request
        $product_id = $request->input('product_id');
        // $selectedSize = $request->input('selectedSize', ''); 
        $attribute_id = $request->input('selectedAttributeId', ''); 

        //kiểm tra đã chọn size chưa
        if (empty($attribute_id)) {
            return redirect()->route('show', $product_id)->with('error', 'Please select a size before adding to cart.');
        }

        // Kiểm tra xem sản phẩm có tồn tại không
        $product = Product::find($product_id);
        $product_attribute = ProductAttribute::find($attribute_id);

        if (!$product) {
            return abort(404);
        }
        
        // Kiểm tra xem giỏ hàng đã tồn tại chưa, nếu chưa thì tạo mới
        if(!Session::has('cart')) {
            Session::put('cart', []);
        }
        $cart = Session::get('cart', []);

        // $cartKey = $product_id . '-' . $selectedSize;
        $cartKey = $product_id . '-' . $attribute_id;

        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity']++;
            if ($cart[$cartKey]['quantity'] < 1) {
                $cart[$cartKey]['quantity'] = 1;
            }
        } else {

            $cart[$cartKey] = [
                'product_id' => $product_id,
                'attribute_id' => $attribute_id,
                'name' => $product->product_name,
                'image' => $product->image,
                'gender' => $product->gender,
                'price' => $product->default_price,
                // 'size' => $selectedSize,
                'size' => $product_attribute->attribute_value,
                'quantity' => 1, 
            ];     
        }

        //Lưu thông tin giỏ hàng vào session
        Session::put('cart', $cart);

        return redirect()->route('show', $product_id)->with('success', 'Add to cart success');
    }


    public function increaseQuantity(Request $request)
    {
        $cart = Session::get('cart');
        $product_id = $request->input('product_id');

        if (isset($cart[$product_id])) {
            $cart[$product_id]['quantity']++;
        }

        Session::put('cart', $cart);

        return redirect()->route('cartIndex');
    }

    public function decreaseQuantity(Request $request)
    {
        $cart = Session::get('cart');
        $product_id = $request->input('product_id');

        if (isset($cart[$product_id]) && $cart[$product_id]['quantity'] > 1) {
            $cart[$product_id]['quantity']--;
        }

        Session::put('cart', $cart);

        return redirect()->route('cartIndex');
    }

    public function removeItemFromCart(Request $request)
    {
        $cart = Session::get('cart');
        $product_id = $request->input('product_id');

        if (isset($cart[$product_id])) {
            unset($cart[$product_id]);
            session()->put('cart', $cart);
        }

        if (empty($cart)) {
            session()->forget('cart');
        }

        return redirect()->route('cartIndex')->with('success', 'Remove products from cart successfully');
    }

    public function handlePaymentCallback(Request $request)
    {
        $vnp_ResponseCode = $request->input('vnp_ResponseCode');
        if ($vnp_ResponseCode === '00') {
            $email = Session::get('email');
            $customer = Customer::query()->where('email', $email)->first();
            $cart = Session::get('cart');

            $newOrder = new Order();
            $newOrder->customer_id = $customer->customer_id;
            $newOrder->order_date = Carbon::now();
            $newOrder->delivery_date = Carbon::now();
            $newOrder->status = 'Completely payment';
            $newOrder->save();

            $order_id = $newOrder->order_id;

            foreach ($cart as $cartItem) {
                $product_id = $cartItem['product_id'];
                $attribute_id = $cartItem['attribute_id'];
                $quantity = $cartItem['quantity'];
                $price = $cartItem['price'];
            
                $newDetailOrder = new DetailOrder([
                    'order_id' => $order_id, // Sử dụng order_id vừa tạo
                    'product_id' => $product_id,
                    'attribute_id' => $attribute_id,
                    'quantity' => $quantity,
                    'price' => $price,
                    'notes' => '',
                ]);

                $newDetailOrder->save();
            }

            // Send email
            $email_user = $customer->email;
            $name_user = $customer->fullName;
            Mail::send('emails.checkout', compact('newOrder', 'customer', 'newDetailOrder', 'cart'), function ($email) use ($email_user, $name_user) {
                $email->subject('Sneaker Shop - Order');
                $email->to($email_user, $name_user);
            });

            Session::forget('cart');


            return view('cart.success');
        } else {
            return view('cart.failure');
        }
    }
    
}
