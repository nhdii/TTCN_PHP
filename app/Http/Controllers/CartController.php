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
        // Lấy dữ liệu từ request
        $product_id = $request->input('product_id');
        $attribute_id = $request->input('attribute_id');
        $size = $request->input('size');

        // Kiểm tra xem sản phẩm và thuộc tính có tồn tại không
        $product = Product::find($product_id);
        $attribute = ProductAttribute::where('product_id', $product_id)
            ->where('attribute_id', $attribute_id)
            ->first();

        if (!$product || !$attribute) {
            abort(404);
        }

        // Kiểm tra giỏ hàng đã được tạo chưa
        if (!Session::has('cart')) {
            Session::put('cart', []);
        }

        // Lấy giỏ hàng từ Session
        $cart = Session::get('cart');

        // Kiểm tra sản phẩm đã có trong giỏ hàng chưa
        if (isset($cart[$product_id])) {
            // Nếu đã có, tăng số lượng lên 1
            $cart[$product_id]['quantity']++;
        } else {
            // Nếu chưa có, thêm sản phẩm mới vào giỏ hàng
            $cart[$product_id] = [
                'product_id' => $product_id,
                'name' => $product->product_name,
                'price' => $product->default_price,
                'size' => $size,
                'quantity' => 1,
            ];
        }

        // Lưu giỏ hàng mới vào Session
        Session::put('cart', $cart);

        // Trả về kết quả cho Ajax
        return response()->json([
            'message' => 'Sản phẩm đã được thêm vào giỏ hàng',
            'cartCount' => count($cart),
        ]);
    }




    public function increaseQuantity(Request $request, $product_id)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$product_id])) {
            $cart[$product_id]['quantity']++;
        }

        Session::put('cart', $cart);

        return redirect()->route('cart.index');
    }

    public function decreaseQuantity(Request $request, $product_id)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$product_id]) && $cart[$product_id]['quantity'] > 1) {
            $cart[$product_id]['quantity']--;
        }

        Session::put('cart', $cart);

        return redirect()->route('cart.index');
    }

    public function removeItemFromCart(Request $request, $product_id)
    {
        $cart = Session::get('cart', []);

        if (isset($cart[$product_id])) {
            unset($cart[$product_id]);
            session()->put('cart', $cart);
        }

        if (empty($cart)) {
            session()->forget('cart');
        }

        return redirect()->route('cart.index');
    }
    
}
