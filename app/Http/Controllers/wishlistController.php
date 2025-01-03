<?php

namespace App\Http\Controllers;

use App\Models\menu;
use App\Models\sub_menu;
use Illuminate\Http\Request;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class wishlistController extends Controller
{
    public function index(){
        $items = Cart::instance('wishlist')->content();
      
        $menus = menu::with('sub_menu')->orderBy('id','ASC')->get();
        $categories_list = category::orderBy('id','ASC')->get();
        return view('wishlist',compact('items','menus','categories_list'));
    }
    public function add_wishlist(Request $request){
        Cart::instance('wishlist')->add($request->id, $request->name, $request->quantity, $request->price)->associate('App\Models\product');
        return redirect()->back();
    }
    public function move_to_cart($rowId){
        $item = Cart::instance('wishlist')->get($rowId);    
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id, $item->name, $item->qty, $item->price)->associate('App\Models\product');
        return redirect()->back();
    }
    public function wishlist_increase($rowId){
        $product = Cart::instance('wishlist')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('wishlist')->update($rowId, $qty);
        return redirect()->back();
    }
    public function wishlist_decrease($rowId){
        $product = Cart::instance('wishlist')->get($rowId);
        $qty  = $product->qty - 1;
        Cart::instance('wishlist')->update($rowId, $qty);
        return redirect()->back();
    }
    public function destroy_wishlist($rowId){
        Cart::instance('wishlist')->remove($rowId);
        return redirect()->back();
    }
    public function remove_wishlist(){
        Cart::instance('wishlist')->destroy();
        return redirect()->back();
    }
    public function all_move_cart(Request $request){
       $items = Cart::instance('wishlist')->content();

       foreach($items as $item){
            Cart::instance('cart')->add($item->id, $item->name, $item->qty, $item->price)->associate('App\Models\product');
       }
       Cart::instance('wishlist')->destroy();
       return redirect('home');
    }
}
