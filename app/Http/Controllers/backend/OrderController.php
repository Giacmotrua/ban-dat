<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $data = Orders::checkSearch($request->keyword)->paginate(5);
        return view('backend.order.index', compact(['data']));
    }

    public function detail($id)
    {
        $data = Orders::findOrFail($id);
        $product = json_decode($data->order_detail);
        return view('backend.order.detail', compact(['data', 'product']));
    }

    public function delivery(Request $request, $id)
    {
        DB::table('orders')->where('id', $id)->update(['status' => $request->status]);
        $order = Orders::findOrFail($id);
        if ($request->status > 0) {
            $name = $order->name;
            $email = $order->email;
            $cart = json_decode($order->order_detail);
            $data = [
                'name' => $order->name,
                'phone' => $order->phone,
                'cart' => $cart,
                'codeOrder' => $order->code_order,
                'header' => 'Đơn hàng ' .$order->code_order .' của bạn ' .$this->deliveryStatus($request->status),
                'date' => $order->created_at
            ];
            Mail::send('vendor.send-mail', $data, function ($message) use ($name, $email){
                $message->to($email)->subject('Thông tin mới về đơn hàng của bạn - ZClothing');
                $message->from($email, $name);
            });
        }
        return redirect()->back()->with('success', 'Cập nhập trạng thái thành công');
    }

    public function delete($id)
    {
        $id = is_numeric($id) ? $id : 0;
        if($id > 0){
            $order = Orders::findOrFail($id);
            $name = $order->name;
            $email = $order->email;
            $cart = json_decode($order->order_detail);
            $data = [
                'name' => $order->name,
                'phone' => $order->phone,
                'cart' => $cart,
                'codeOrder' => $order->code_order,
                'header' => 'Đơn hàng của bạn đã bị huỷ',
                'date' => $order->created_at
            ];
            $del = $order->delete();
            if ($del) {
                Mail::send('vendor.send-mail', $data, function ($message) use ($name, $email){
                    $message->to($email)->subject('Thông tin mới về đơn hàng của bạn - ZClothing');
                    $message->from($email, $name);
                });
                return redirect()->back()->with('success', 'Xoá danh mục thành công');
            }
            return redirect()->back()->with('message', 'Xoá danh mục thất bại');
        }
    }

    public function deliveryStatus($status)
    {
        $deliveryStatus = '';
        switch ($status) {
            case 1 :
                $deliveryStatus = 'đã được xác nhận';
                break;
            case 2 :
                $deliveryStatus = 'đã giao cho bên vận chuyển';
                break;
            case 3 :
                $deliveryStatus = 'đã giao thành công';
                break;
        }
        return $deliveryStatus;
    }
}
