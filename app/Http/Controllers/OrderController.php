<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\order;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    public function index()
    {
        $orders = order::latest()->get();
        return view('order.index', compact('orders'));
    }

    public function store(Request $request, $cartid)
    {
        $data = $request->data;
        $data = base64_decode($data);
        $data = json_decode($data);
        if ($data->status == 'completed') {
            //store order here
            $cart = Cart::find($cartid);
            $product = Product::find($cart->product_id);
            if ($cart->qty > $product->stock) {
                return back()->with('success', 'Product is out of stock');
            }

            // and if the product stock is 0 or less than the quantity ordered by the user, then return back with a message  'Product is out of stock'




            $data = [
                'user_id' => $cart->user_id,
                'product_id' => $cart->product_id,
                'qty' => $cart->qty,
                'price' => $cart->product->price,
                'payment_method' => 'Esewa',
                'name' => $cart->user->name,
                'phone' => $cart->user->phone,
                'address' => $cart->user->address,
            ];
            Order::create($data);
            $product->stock = (int)$product->stock - $cart->qty;
            $product->save();

            $cart->delete();
            return redirect(route('homepage'))->with('success', 'Order placed successfully');
        }
    }

    public function storecod(Request $request)
    {


        $cart = cart::find($request->cart_id);

        //fetch the product details from the cart
        $product = product::find($cart->product_id);

        //check if the product is out of stock


        if ($cart->qty > $product->stock) {
            return back()->with('sucess', 'Product is out of stock');
        }



        $data = [
            'user_id' => $cart->user_id,
            'product_id' => $cart->product_id,
            'qty' => $cart->qty,
            'price' => $cart->product->price,
            'payment_method' => 'COD',
            'name' => $cart->user->name,
            'phone' => $cart->user->phone,
            'address' => $cart->user->address,
        ];



        Order::create($data);

        //decrease the stock of the product
        //update the stock of the product
        $product->stock = (int)$product->stock - $cart->qty;
        $product->save();


        $cart->delete();
        return redirect()->route('homepage')->with('success', 'Order Placed Successfully');
    }

    public function status($id, $status)
    {
        $order = Order::find($id);
        $order->status = $status;
        $order->save();
        //send mail to user
        $data = [
            'name' => $order->name,
            'status' => $status,
        ];
        Mail::send('mail.order', $data, function ($message) use ($order) {
            $message->to($order->user->email, $order->name)
                ->subject('Order Status');
        });
        return back()->with('success', 'Order is now ' . $status);
    }

    public function myorder()
    {
        // Fetch orders for the logged-in user
        // fetch where status not equal to cancelled all
        $orders = Order::where('user_id', Auth::id())->where('status', '!=', 'Cancelled')->latest()->get();

        // Pass the orders to the Blade view
        return view('myorder', compact('orders'));
    }

    public function destroy(Request $request)
    {
        //  deleted the order if the status is pending
        $order = Order::find($request->dataid);
        if ($order->status == 'pending') {

            // after the order is deleted, increase the stock of the product
            $product = Product::find($order->product_id);
            $product->stock = $product->stock + $order->qty;
            // i want to change the status of the order to cancelled
            $order->status = 'Cancelled';
            $order->save();
            return back()->with('success', 'Order Cancelled successfully');
        } else {
            return back()->with('success', 'Order cannot be Cancelled, Please contact with seller for more information');
        }
    }


    public function orderhistory()
    {
        $ordershistory = Order::where('status', 'Cancelled')->latest()->get();
        return view('cancelhistory', compact('ordershistory'));
    }

    public function orderhistorydestroy(Request $request)
    {
        $order = Order::find($request->dataid);
        $order->delete();
        return back()->with('success', 'Order history deleted successfully');
    }
}
