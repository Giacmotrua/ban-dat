<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use http\Message;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Orders;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\TrackingRequest;

class CartController extends Controller
{
    public function index()
    {
        return view('frontend.cart.index');
    }

    public function add($id)
    {
        $product = Products::findOrFail($id);

        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => 1
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Thêm sản phẩm vào giỏ hàng thành công');
    }

    public function update(Request $request)
    {
        if ($request->ajax()) {

            $cart = session()->get('cart');

            $id = (int)$request->id;
            $quantity = (int)$request->quantity;
            if ($quantity == 0) {
                unset($cart[$id]);
            } else {
                $cart[$id]["quantity"] = $quantity;
            }
            session()->forget('cart');
            session()->put('cart', $cart);

            return  session()->get('cart');
        }
    }

    public function remove(Request $request)
    {
        if ($request->ajax()) {
            $id = (int)$request->id;
            $cart = session()->get('cart');
            unset($cart[$id]);
            session()->put('cart', $cart);
            session()->flash('success', 'Cart remove successfullyd');
        }
    }

    public function checkout()
    {
        return view('frontend.cart.checkout');
    }

    public function order(StoreOrderRequest $request)
    {
        $infoOrder = $request->all();
        $quantity = 0;
        $total = 0;
        $cart = session()->get('cart');
        foreach ($cart as $item){
            $quantity += $item['quantity'];
            $total += $item['price'] * $item['quantity'];
        }
        $infoOrder['code_order'] = "ZC".rand(1000000, 9999999);
        $infoOrder['money'] = $total;
        $infoOrder['quantity'] = $quantity;
        $infoOrder['order_detail'] = json_encode($cart);
        $name = $infoOrder['name'];
        $email = $infoOrder['email'];
        Orders::create($infoOrder);
        $data = [
            'name' => $infoOrder['name'],
            'phone' => $infoOrder['phone'],
            'cart' => json_decode($infoOrder['order_detail']),
            'codeOrder' => $infoOrder['code_order'],
            'header' => 'Đơn hàng ' .$infoOrder['code_order'] .' của bạn đã được đặt thành công',
            'date' => date('Y-m-d')
        ];
        Mail::send('vendor.send-mail', $data, function ($message) use ($name, $email){
            $message->to($email)->subject('Đơn hàng của bạn đã được đặt thành công - ZClothing');
            $message->from($email, $name);
        });
        session()->forget('cart');

        return view('frontend.cart.thank', compact('name'));
    }

    public function tracking(Request $request)
    {
        $data = null;
        $product = null;
        if ($request->codeOrder){
            $data = Orders::where('code_order', '=', $request->codeOrder)->first();
            if ($data) {
                $product = json_decode($data->order_detail);
            }
        }
        return view('frontend.cart.tracking', compact('data', 'product'));
    }
}
