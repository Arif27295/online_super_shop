<?php

namespace App\Http\Controllers;


use App\Models\menu;
use App\Models\order;
use App\Models\address;
use App\Models\product;
use App\Models\category;
use App\Models\sub_menu;
use App\Models\orderItem;
use App\Models\transection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class cartController extends Controller
{
    public function index(){
        $items = Cart::instance('cart')->content();
       
        $menus = menu::with('sub_menu')->orderBy('id','ASC')->get();
        $categories_list = category::orderBy('id','ASC')->get();
        return view('cart', compact('items','menus','categories_list'));
    }
    public function add_to_cart(Request $request){
        Cart::instance('cart')->add($request->id, $request->name, $request->quantity, $request->price)->associate('App\Models\product');
        return redirect()->back();
    }
    public function clear_cart(){
        Cart::instance('cart')->destroy();
        return redirect()->back();
    }
    public function increase($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        return redirect()->back();
    }
    public function decrease($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty  = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        return redirect()->back();
    }
    public function remove_cart_item($id){
        Cart::instance('cart')->remove($id);
        return redirect()->back();
    }


    public function checkout(){
        if(!Auth::check()){
            return redirect()->route('login');
        }
        $address  = address::where('user_id', Auth::user()->id)->where('isdefault', 1)->first();

        $categories_list = category::orderBy('id','ASC')->get();
        $menus = menu::with('sub_menu')->orderBy('id','ASC')->get();
        return view('checkout',compact('address','categories_list','menus'));
    }
    public function place_order(Request $request){
        $user_id = Auth::user()->id;
        $address = address::where('id', $user_id)->where('isdefault', true)->first();  
        
        if(!$address){
            $request->validate([
                'name' => "required|max: 100",
                'phone' => 'required|numeric|digits: 11',
                'zip' => "required|digits: 4",
                'state' => "required",
                'city' => "required",
                'address' => "required",
                'locality' => "required",
                'landmark' => "required",
            ]);

            $address = new address();
            $address->name = $request->name;
            $address->phone = $request->phone;
            $address->locality = $request->locality;
            $address->address = $request->address;
            $address->city = $request->city;
            $address->state = $request->state;
            $address->country = 'Bangladesh';
            $address->landmark = $request->landmark;
            $address->zip = $request->zip;
            $address->user_id = $user_id;
            $address->isdefault = true;
            $address->save();
        }
        $this->setAmounforCheckout();
        $order = new order();
        $order->user_id =$user_id ;
        $order->subtotal =Cart::instance('cart')->subtotal();
        $order->tax =Cart::instance('cart')->tax();
        $order->total =Cart::instance('cart')->total();
        $order->name =$request->name;
        $order->phone =$request->phone;
        $order->locality =$request->locality;
        $order->address =$request->address;
        $order->city =$request->city;
        $order->state =$request->state;
        $order->country ='Bangladesh';
        $order->landmark =$request->landmark ;
        $order->zip =$request->zip;
        $order->save();

        foreach(Cart::instance('cart')->content() as $item){
            $order_item = new orderItem();
            $order_item->product_id = $item->id;
            $order_item->order_id = $order->id;
            $order_item->price = $item->price;
            $order_item->quantity = $item->qty;
            $order_item->save();
        }

        if($request->mode == 'card'){
            //
        }elseif($request->mode == 'paypal'){

        }elseif($request->mode == 'cod'){
            $trasection = new transection();
            $trasection->user_id = $user_id;
            $trasection->order_id = $order->id;
            $trasection->mode = $request->mode;
            $trasection->status = "pending";
            $trasection->save();
        }

        Cart::instance('cart')->destroy();
        Session::forget('checkout');
        Session::forget('coupon');
        Session::forget('discounts');
        Session::put('order_id', $order->id);

        
        return redirect()->route('order_confirmation',compact('order'));
    }
    public function setAmounforCheckout(){
        if(!Cart::instance('cart')->content()->count() > 0){
            Session::forget('checkout');
            return;
        }
        if(Session::has('coupon')){
            Session::put('checkout',[
                'discount' => Session::get('discount')['discount'],
                'subtotal' => Session::get('discount')['subtotal'],
                'tax' => Session::get('discount')['tax'],
                'total' => Session::get('discount')['total'],
            ]);
        }
        else{
            Session::put('checkout',[
                'discount' => 0,
                'subtoatl' => Cart::instance('cart')->subtotal(),
                'tax' => Cart::instance('cart')->tax(),
                'total' => Cart::instance('cart')->total(),
            ]);
        }
    }
    public function order_confirmation(){
       
        if (Session::has('order_id')) {
            // Retrieve the order
            $orderId = Session::get('order_id');
            $order = order::find($orderId);
        
            // Check if order exists
            if (!$order) {
                return redirect()->route('checkout')->with('message', 'Order not found.');
            }
        
            // Retrieve transactions for the specific order
            $transection = transection::where('order_id', $orderId)
                ->select('id', 'order_id')
                ->orderBy('id')
                ->get();
            $order_item = orderItem::where('order_id', $orderId)->get();
            
            $productIds = $order_item->pluck('product_id')->toArray();    

            $products = product::whereIn('id', $productIds)
                ->select('id', 'name')
                ->orderBy('name')
                ->get();
        
            // Return data to the view
            $categories_list = category::orderBy('id','ASC')->get();
            $menus = menu::with('sub_menu')->orderBy('id','ASC')->get();
            return view('order_confirmation', compact('order', 'transection','products','categories_list','menus'));
        } else {
            return redirect()->route('shop')->with('message', 'Order ID not found in session.');
        }

        
        
    }
}