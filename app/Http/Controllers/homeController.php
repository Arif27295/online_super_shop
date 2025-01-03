<?php

namespace App\Http\Controllers;

use App\Models\menu;
use App\Models\sub_menu;
use App\Models\slide;
use App\Models\product;
use App\Models\category;
use App\Models\orderItem;
use Illuminate\Http\Request;
use App\Models\sidebar_banner;
use App\Models\weekend_banner;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    public function index(){
        $first_category = category::first();

        $first_slider = slide::first();
        $slider = slide::orderBy('id','DESC')->skip(1)->paginate(3);
        $sidebar_banner = sidebar_banner::orderBy('id','DESC')->paginate(3);
        $weekend_banner = weekend_banner::orderBy('id','DESC')->paginate(4);
        $categories = category::orderBy('id','ASC')->skip(1)->take(8)->get();
        $products = product::orderBy('id','ASC')->paginate(10);
        $menus = menu::with('sub_menu')->orderBy('id','ASC')->get();
        $categories_list = category::orderBy('id','ASC')->get();
        $best_product = DB::select("SELECT products.*, 
                                    (SELECT COUNT(*) 
                                        FROM order_items 
                                        WHERE products.id = order_items.product_id) AS order_item_count
                                FROM products
                                HAVING order_item_count >= 5
                                ORDER BY order_item_count DESC;
                                ");

        return view('index',compact('slider','first_slider','sidebar_banner','products','weekend_banner','first_category','categories','best_product','menus','categories_list'));
    }

    public function search(Request $request){
        $query = $request->input('query');
        $results = product::where('name','LIKE', "%$query%")->take(10)->get();
        return response()->json($results);
    }
}
