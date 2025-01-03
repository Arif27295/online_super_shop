<?php

namespace App\Http\Controllers;

use App\Models\menu;
use App\Models\sub_menu;
use App\Models\brand;
use App\Models\images;
use App\Models\Review;
use App\Models\product;
use App\Models\category;
use App\Models\subCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class shopController extends Controller
{
    public function index(Request $request){
        $order_column = "";
        $order_serial = "";
        $order = $request->query('order', -1);
        switch($order){
            case 1:
                $order_column = 'created_at';
                $order_serial = 'DESC';
                break;
            case 2:
                $order_column = 'created_at';
                $order_serial = 'ASC';
                break;
            case 3:
                $order_column = 'regular_price';
                $order_serial = 'ASC';
                break;
            case 3:
                $order_column = 'regular_price';
                $order_serial = 'DESC';
                break;
            default:
                $order_column = 'id';
                $order_serial = 'DESC';
                break;
        }



        $category_ = $request->query('categories');
        $subcategory_ = $request->query('subcategory');
        $brands_ = $request->query('brands');
        $stock = $request->query('stock_checkbox');
        $outofstock = $request->query('outstock_checkbox');

        $min_price = $request->query('min', 1);
        $max_price = $request->query('max', 50000);

        $products = product::where(function($query) use ($category_) {
            $query->whereIn('category_id', explode(',' , $category_))
                ->orWhereRaw("'" . $category_ . "' = ''");
             })->with('reviews')
            
             ->where(function($query) use ($subcategory_) {
                $query->whereIn('subcategory_id', explode(',' , $subcategory_))
                    ->orWhereRaw("'" . $subcategory_ . "' = ''");
            })
            
            ->where(function($query) use ($brands_) {
                $query->whereIn('brand_id', explode(',' , $brands_))
                    ->orWhereRaw("'" . $brands_ . "' = ''");
            })
        
            ->where(function($query) use ($min_price, $max_price){
                $query->whereBetween('regular_price',[$min_price,$max_price])
                ->orWhereBetween('sale_price',[$min_price,$max_price]);
            })
            ->when($stock, function($query) use ($stock) {
                $query->where('stock', $stock);
            })
            ->when($outofstock, function($query) use ($outofstock) {
                $query->where('stock', $outofstock);
            })
            ->orderBy($order_column, $order_serial)->paginate(10);
                
             $maxSalePrice = product::max('sale_price');
             $maxRegularPrice = product::max('regular_price');
             $maxPrice = max($maxSalePrice, $maxRegularPrice);

        $brands = brand::orderBy('name', 'DESC')->get();
        $categories = Category::with('subcategories')->get();
        $menus = menu::with('sub_menu')->orderBy('id','ASC')->get();
        $categories_list = category::orderBy('id','ASC')->get();
        return view('shop', compact('products', 'brands', 'categories', 'category_','subcategory_','brands_','min_price','max_price','maxPrice','stock','outofstock','order','menus','categories_list'));

    }
    public function product_details($product_slug){
        $product = product::where("slug", $product_slug)->first();
        $rproduct = product::where("slug",'<>', $product_slug)->where('category_id',$product->category_id)->take(8)->get();
        $images = images::where('images_id', $product->id)->get();
        $reviews = Review::orderBy('id', 'DESC')->get();
        $r_reviews = Review::where('product_id', $product->id)->where('user_id', Auth::id())->first();
        $menus = menu::with('sub_menu')->orderBy('id','ASC')->get();
        $auth_reviews = Auth::check() ? Review::where('user_id', Auth::user()->id)->get() : collect();
        $categories_list = category::orderBy('id','ASC')->get();
        $reviewCountForProduct = $reviews->where('product_id', $product->id)->count();

        return view('product_details',compact('product', 'images','rproduct','reviews','r_reviews','reviewCountForProduct','auth_reviews','menus','categories_list'));
    }


}
