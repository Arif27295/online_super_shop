<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\menu;
use App\Models\order;
use App\Models\address;
use App\Models\category;
use App\Models\sub_menu;
use App\Models\orderItem;
use App\Models\transection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    public function index(){
        $menus = menu::with('sub_menu')->orderBy('id','ASC')->get();
        $categories_list = category::orderBy('id','ASC')->get();
        return view('user.index',compact('menus','categories_list'));
    }
    public function order(){
        $orders = order::where('user_id',Auth::user()->id)->orderBy('created_at','ASC')->paginate(10);
        $menus = menu::with('sub_menu')->orderBy('id','ASC')->get();
        $categories_list = category::orderBy('id','ASC')->get();
        return view('user.order', compact('orders','menus','categories_list'));
    }
    public function order_details($id){
        $order = order::find($id);
        $orderItems = orderItem::where('order_id',$id)->orderBy('id')->paginate(12);
        $transection = transection::where('order_id', $id)->first();
        $menus = menu::with('sub_menu')->orderBy('id','ASC')->get();
        $categories_list = category::orderBy('id','ASC')->get();
        return view('user.order_details',compact('order','orderItems','transection','menus','categories_list')); 
    }
    public function order_cancel(Request $request){
        $order = order::findOrFail($request->order_id);
        $order->status = 'canceled';
        $order->canceled_date= Carbon::now();
        $order->save();
        return back()->with('status','Order delete successfully');
    }
    public function user_profile(){
        $menus = menu::with('sub_menu')->orderBy('id','ASC')->get();
        $menus = menu::with('sub_menu')->orderBy('id','ASC')->get();
        $categories_list = category::orderBy('id','ASC')->get();
        return view('user.user_profile',compact('menus','categories_list'));
    }
    public function address(){
        $address = address::where('id', Auth::user()->id)->first();
        $menus = menu::with('sub_menu')->orderBy('id','ASC')->get();
        $categories_list = category::orderBy('id','ASC')->get();

        return view('user.address',compact('address','menus','categories_list'));
    }
    public function update_address(Request $request){
        $address = address::findOrFail($request->user_id);
        $address->name = $request->name;
        $address->phone = $request->phone;
        $address->locality = $request->locality;
        $address->address = $request->address;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->landmark = $request->landmark;
        $address->zip = $request->zip;
        $address->save();
        return back()->with('success','Data updated successfully');
    }
}
