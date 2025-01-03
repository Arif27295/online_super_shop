<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\menu;
use App\Models\User;
use App\Models\brand;
use App\Models\order;
use App\Models\slide;
use App\Models\images;
use App\Models\address;
use App\Models\product;
use App\Models\category;
use App\Models\orderItem;
use App\Models\subCategory;
use App\Models\shop_order;
use App\Models\shop_order_items;
use App\Models\shop_transection;
use App\Models\transection;
use Illuminate\Http\Request;
use App\Models\sidebar_banner;
use App\Models\sub_menu;
use App\Models\weekend_banner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
   public function index(){
   $orders = order::orderBy('id','DESC')->paginate(10);
    $dashbord_orders = DB::select(" Select sum(total) As TotalAmount,
                                    sum(if(status = 'ordered', total, 0)) As TotalOrderAmount,
                                    sum(if(status = 'delivered',total, 0)) As TotalDeleiverdAmount,
                                    sum(if(status ='canceled', total, 0)) As TotalCanceledAmount,
                                    COUNT(*) As Total,
                                    sum(if(status = 'ordered', 1, 0)) As TotalOrdered,
                                    sum(if(status = 'canceled',1,0)) As TotalCanceled,
                                    sum(if(status = 'delivered',1,0)) As TotalDeliverd
                                    From orders
                                  ");

    return view('admin.index', compact('orders','dashbord_orders'));
   }

   public function brand(){
      $brands = brand::orderBy('id','ASC')->paginate(12);
      return view('admin.brand', compact('brands'));
   }
   public function add_brand(){
      return view('admin.add_brand');
   }
   public function create_brand(Request $request){

      $request->validate([
         'name'=>'required|min:3',
         'slug'=>'required',
         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      if ($request->hasFile('image')) {
         $image = $request->file('image');
         $imageFolder = time() . '.' . $image->extension();
         $image->move(public_path('brand_image'), $imageFolder);
     } else {
         return back()->withErrors(['image' => 'Image file is required.']);
      }

         $brand = new brand();
         $brand->name = $request->name;
         $brand->slug = $request->slug;
         $brand->image = $imageFolder;
         $brand->save();
         return redirect('brand')->with('success','Data inserted success.');
   }

   public function edit_brand($id){
      $edit_data = brand::findorFail($id);
      return view('admin.edit_brand',compact('edit_data'));
   }

   public function update_brand($id, Request $request){
      $request->validate([
         'name'=>'required|min:3',
         'slug'=>'required',
      ]);

      if ($request->hasFile('image')) {
         $image = $request->file('image');
         $imageFolder = time() . '.' . $image->extension();
         $image->move(public_path('brand_image'), $imageFolder);
     } else {
         return back()->withErrors(['image' => 'Image file is required.']);
      }

         $brand = brand::findOrFail($id);
         $brand->name = $request->name;
         $brand->slug = $request->slug;
         $brand->image = $imageFolder;
         $brand->save();
         return redirect('brand')->with('success','Data update success.');
   }

   public function delete_brand($id){
      brand::destroy($id);
      return back()->with('delete','Delete Successfully');
   }

   public function category(){
      $categories = category::orderBy('id','DESC')->paginate(12);
      $subCategory = subCategory::orderBy('id','DESC')->paginate(12);
      return view('admin.category',compact('categories','subCategory'));
   }
   public function category_select(Request $request){
    $category_id = $request->category_id;

    if ($category_id) {
        $sub_categories = SubCategory::where('category_id', $category_id)->get();
        return response()->json($sub_categories);
    }

    return response()->json(['error' => 'No category selected'], 400);
}

   public function add_category(){
      return view('admin.add_category');
   }
   public function create_category(Request $request){
      $request->validate([
         'name'=>'required|min:3',
         'slug'=>'required',
      ]);
      if ($request->hasFile('image')) {
         $image = $request->file('image');
         $imageFolder = time() . '.' . $image->extension();
         $image->move(public_path('category_image'), $imageFolder);
     } else {
         return back()->withErrors(['image' => 'Image file is required.']);
      }

         $category = new category();
         $category->name = $request->name;
         $category->slug = $request->slug;
         $category->icon_name = $request->icon_name;
         $category->image = $imageFolder;
         $category->save();
         return redirect('category')->with('success','Data inserted success.');
   }
   public function edit_category($id){
      $edit_data = category::findOrFail($id);
      return view('admin.edit_category',compact('edit_data'));
   }
   public function update_category($id, Request $request){
      $request->validate([
         'name'=>'required|min:3',
         'slug'=>'required',
      ]);

      if ($request->hasFile('image')) {
         $image = $request->file('image');
         $imageFolder = time() . '.' . $image->extension();
         $image->move(public_path('category_image'), $imageFolder);
     } else {
         return back()->withErrors(['image' => 'Image file is required.']);
      }

         $category = category::findOrFail($id);
         $category->name = $request->name;
         $category->slug = $request->slug;
         $category->icon_name = $request->icon_name;
         $category->image = $imageFolder;
         $category->save();
         return redirect('category')->with('success','Data update success.');
   }
   public function delete_category($id){
      category::destroy($id);
      return back()->with('delete','Delete Successfully');
   }
   public function add_subcategory(){
      $categories = category::select('id','name')->get();
      return view('admin.add_subcategory',compact('categories'));
   }
   public function edit_subcategory($id){
      $subCategory = subCategory::findOrFail($id);
      $categorys = category::select('id','name')->orderBy('name')->get();
      return view('admin.edit_subcategory', compact('subCategory','categorys'));
   }
   public function create_subcategory(Request $request){
      $request->validate([
         'name'=>'required|min:3',
         'slug'=>'required',
         'category'=>'required'
      ]);

         $subcategory = new subCategory();
         $subcategory->name = $request->name;
         $subcategory->slug = $request->slug;
         $subcategory->category_id = $request->category;
         $subcategory->save();
         return redirect('category')->with('success','Data inserted success.');
   }
   public function delete_subcategory($id){
      subCategory::destroy($id);
      return back()->with('delete','Delete Successfully');
   }
   public function update_subcategory($id,Request $request){
      $request->validate([
         'name'=>'required|min:3',
         'slug'=>'required',
         'category'=>'required'
      ]);

         $subcategory = subCategory::findOrFail($id);
         $subcategory->name = $request->name;
         $subcategory->slug = $request->slug;
         $subcategory->category_id = $request->category;
         $subcategory->save();
         return redirect('category')->with('update','Data updated successfully.');
   }
   public function product(){
      $products = product::with('subCategory')->orderBy('id','ASC')->paginate(12);
      return view('admin.product', compact('products'));
   }
   public function add_product(){
      $categorys = category::select('id','name')->orderBy('name')->get();
      $subcategory = subcategory::select('id','name')->orderBy('name')->get();
      $brands = brand::select('id','name')->orderBy('name')->get();
      return view('admin.add_product', compact('categorys', 'brands','subcategory'));
   }
   public function create_product(Request $request){
      $request->validate([
         'name'=>'required|min:3',
         'slug'=>'required',
         'tags'=>'required',
         'discount'=>'required',
         'reg_price'=>'required|numeric',
         'sal_price'=>'required|numeric',
         'category'=>'required',
         'brand'=>'required',
      ]);
      $product = new product();
      $product->name = $request->name;
      $product->slug = $request->slug;
      $product->tags = $request->tags;
      $product->pro_discount = $request->discount;
      $product->short_description = $request->sho_description;
      $product->description = $request->description;
      if($request->hasFile("image")){
         $file=$request->file('image');
         $imageName=time().'_'.$file->getClientOriginalName();
         $file->move(\public_path("product_image/"), $imageName);
         $product->image = $imageName;
      }else {
         return back()->withErrors(['image' => 'Image file is required.']);
      }
      $product->regular_price = $request->reg_price;
      $product->sale_price = $request->sal_price;
      $product->SKU = $request->sku;
      $product->qty = $request->qty;
      $product->stock = $request->stock;
      $product->featured = $request->featured;
      $product->category_id = $request->category;
      $product->brand_id = $request->brand;
      $product->subcategory_id = $request->subcategory;
      $product->save();

      if ($request->hasFile("images")) {
         $files = $request->file("images");
         foreach ($files as $file) {
             $imageName = time() . '_' . $file->getClientOriginalName();
             $file->move(public_path("images/"), $imageName);
             images::create([
                 'images_id' => $product->id,
                 'images' => $imageName
             ]);
         }
     }else {
      return back()->withErrors(['images' => 'Image file is required.']);
   }
     return redirect('product')->with('success','Data create success.');

   }

   public function edit_product($id){
      $edit_data = product::findOrFail($id);
      $categorys = category::select('id','name')->orderBy('name')->get();
      $brands = brand::select('id','name')->orderBy('name')->get();
      $images = images::where('images_id', $id)->get();
      return view('admin.edit_product', compact('edit_data','categorys','brands','images'));
   }

   public function update_product($id, Request $request){
      $product = product::findOrFail($id);
      $product->name = $request->name;
      $product->slug = $request->slug;
      $product->tags = $request->tags;
      $product->pro_discount = $request->discount;
      $product->short_description = $request->sho_description;
      $product->description = $request->description;
      if($request->hasFile("image")){
         $file=$request->file('image');
         $imageName=time().'_'.$file->getClientOriginalName();
         $file->move(\public_path("product_image/"), $imageName);
         $product->image = $imageName;
      }
      $product->regular_price = $request->reg_price;
      $product->sale_price = $request->sal_price;
      $product->SKU = $request->sku;
      $product->qty = $request->qty;
      $product->stock = $request->stock;
      $product->featured = $request->featured;
      $product->category_id = $request->category;
      $product->brand_id = $request->brand;
      $product->subcategory_id = $request->subcategory;
      $product->save();

      if ($request->hasFile("images")) {
         $files = $request->file("images");
         foreach ($files as $file) {
             $imageName = time() . '_' . $file->getClientOriginalName();
             $file->move(public_path("images/"), $imageName);

             images::create([
               'images_id' => $product->id,
               'images' => $imageName
           ]);

         }
     }

     return redirect('product')->with('success','Data update success.');
   }
   public function delete_images($id){
      return $id;
      images::destroy($id);
      return back();
   }

   public function delete_product($id){
      product::destroy($id);
      return redirect('product')->with('delete','Data delete successfully.');
   }


   public function order(){
      $orders = order::orderBy('created_at','DESC')->paginate(10);
      return view('admin.order', compact('orders'));
   }
   public function order_details($id){
        $order = order::find($id);
        $orderItems = orderItem::where('order_id',$id)->orderBy('id')->paginate(12);
        $transection = transection::where('order_id', $id)->first();
        return view('admin.order_details',compact('order','orderItems','transection'));
   }
   public function update_status(Request $request){
      $order = order::findOrFail($request->order_id);
      $status = $request->status;

      if($status == 'delivered'){
         $order->delivered_date = Carbon::now();
         $order->status = 'delivered';
      }elseif($status == 'canceled'){
         $order->canceled_date = Carbon::now();
         $order->status = 'canceled';
      }
      $order->save();

      if($status == 'delivered'){
         $transection = transection::where('order_id', $request->order_id)->first();
         $transection->status = "approved";
      }elseif($status == 'canceled'){
         $transection = transection::where('order_id', $request->order_id)->first();
         $transection->status = "declined";
      }
      $transection->save();

     return back()->with('status','Status change successfully!');
   }

   public function slide(){
      $slides = slide::orderBy('id','DESC')->paginate(12);
      return view('admin.slider', compact('slides'));
  }
  public function add_slide(){
      return view('admin.add_slide');
  }
  public function create_slider(Request $request){
   $request->validate([
      'title'=>'required|min:3',
      'subtitle'=>'required',
      'description'=>'required',
      'price'=>'required|numeric',
      'discount_offer'=>'required|numeric',
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
   ]);

   if ($request->hasFile('image')) {
      $image = $request->file('image');
      $imageFolder = time() . '.' . $image->extension();
      $image->move(public_path('slider_image'), $imageFolder);
  } else {
      return back()->withErrors(['image' => 'Image file is required.']);
   }

      $slide = new slide();
      $slide->title = $request->title;
      $slide->subtitle = $request->subtitle;
      $slide->description = $request->description;
      $slide->price = $request->price;
      $slide->discount_offer = $request->discount_offer;
      $slide->image = $imageFolder;
      $slide->save();
      return redirect('slide')->with('success','Data inserted success.');
   }

   public function edit_slider($id){
      $slider = slide::findOrFail($id);
      return view('admin.edit_slide', compact('slider'));
   }
   public function update_slider($id, Request $request){
      $request->validate([
         'title'=>'required|min:3',
         'subtitle'=>'required',
         'description'=>'required',
         'price'=>'required|numeric',
         'discount_offer'=>'required|numeric',
         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);

      if ($request->hasFile('image')) {
         $image = $request->file('image');
         $imageFolder = time() . '.' . $image->extension();
         $image->move(public_path('slider_image'), $imageFolder);
      } else {
         return back()->withErrors(['image' => 'Image file is required.']);
      }

      $slide = slide::findOrFail($id);
      $slide->title = $request->title;
      $slide->subtitle = $request->subtitle;
      $slide->description = $request->description;
      $slide->price = $request->price;
      $slide->discount_offer = $request->discount_offer;
         $slide->image = $imageFolder;
         $slide->save();
         return redirect('slide')->with('update','Data updated successfully!');

      }

      public function delete_slider($id){
         slide::destroy($id);
         return redirect('slide')->with('delete','Data delete successfully!');
      }

      public function left_side_banner(){
         $banners = sidebar_banner::orderBy('id','DESC')->paginate(12);
         return view('admin.left_sidebar_banner',compact('banners'));
      }

      public function add_leftside_banner(){
         return view('admin.add_sidebar_banner');
      }


      public function create_sidebar_banner(Request $request){
       $request->validate([
          'title'=>'required|min:3',
          'subtitle'=>'required',
          'tag'=>'required',
          'price'=>'required|numeric',
          'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);

       if ($request->hasFile('image')) {
          $image = $request->file('image');
          $imageFolder = time() . '.' . $image->extension();
          $image->move(public_path('banner_image'), $imageFolder);
      } else {
          return back()->withErrors(['image' => 'Image file is required.']);
       }

          $sidebar_banner = new sidebar_banner();
          $sidebar_banner->title = $request->title;
          $sidebar_banner->subtitle = $request->subtitle;
          $sidebar_banner->tag = $request->tag;
          $sidebar_banner->price = $request->price;
          $sidebar_banner->image = $imageFolder;
          $sidebar_banner->save();
          return redirect('left_side_banner')->with('success','Data inserted success.');
       }

       public function edit_sidebar_banner($id){
          $banner = sidebar_banner::findOrFail($id);
          return view('admin.edit_sidebar_banner',compact('banner'));
         }

      public function update_sidebar_banner($id, Request $request){
          $request->validate([
             'title'=>'required|min:3',
             'subtitle'=>'required',
             'tag'=>'required',
             'price'=>'required|numeric',
             'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);

          if ($request->hasFile('image')) {
             $image = $request->file('image');
             $imageFolder = time() . '.' . $image->extension();
             $image->move(public_path('banner_image'), $imageFolder);
         } else {
             return back()->withErrors(['image' => 'Image file is required.']);
          }

             $sidebar_banner =sidebar_banner::findOrFail($id);
             $sidebar_banner->title = $request->title;
             $sidebar_banner->subtitle = $request->subtitle;
             $sidebar_banner->tag = $request->tag;
             $sidebar_banner->price = $request->price;
             $sidebar_banner->image = $imageFolder;
             $sidebar_banner->save();
             return redirect('left_side_banner')->with('update','Data updated successfully.');
          }
          public function delete_sidebar_banner($id){
             sidebar_banner::destroy($id);
             return redirect('left_side_banner')->with('delete','Data delete successfully!');
            }

            public function weekend_banner(){
               $banners = weekend_banner::orderBy('id','DESC')->paginate(12);
               return view('admin.weekend_banner', compact('banners'));
            }
            public function add_weekend_banner(){
               return view('admin.add_weekend_banner');
            }
            public function create_weekend_banner(Request $request){
                $request->validate([
                   'title'=>'required|min:3',
                   'subtitle'=>'required',
                   'offer'=>'required',
                   'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);

                if ($request->hasFile('image')) {
                   $image = $request->file('image');
                   $imageFolder = time() . '.' . $image->extension();
                   $image->move(public_path('banner_image'), $imageFolder);
               } else {
                   return back()->withErrors(['image' => 'Image file is required.']);
                }

                   $weekend_banner = new weekend_banner();
                   $weekend_banner->title = $request->title;
                   $weekend_banner->subtitle = $request->subtitle;
                   $weekend_banner->discount_offer = $request->offer;
                   $weekend_banner->image = $imageFolder;
                   $weekend_banner->save();
                   return redirect('weekend_banner')->with('success','Data inserted success.');
                }
                public function edit_weekend_banner($id){
                   $banner = weekend_banner::findOrFail($id);
                   return view('admin.edit_weekend_banner',compact('banner'));
                  }
      public function update_weekend_banner($id, Request $request){
        $request->validate([
         'title'=>'required|min:3',
         'subtitle'=>'required',
         'offer'=>'required',
         'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
         $image = $request->file('image');
         $imageFolder = time() . '.' . $image->extension();
         $image->move(public_path('banner_image'), $imageFolder);
       } else {
         return back()->withErrors(['image' => 'Image file is required.']);
       }

       $weekend_banner = weekend_banner::findOrFail($id);
       $weekend_banner->title = $request->title;
       $weekend_banner->subtitle = $request->subtitle;
       $weekend_banner->discount_offer = $request->offer;
       $weekend_banner->image = $imageFolder;
       $weekend_banner->save();
       return redirect('weekend_banner')->with('update','Data updated successfully.');
      }
      public function delete_weekend_banner($id){
         weekend_banner::destroy($id);
         return redirect('weekend_banner')->with('delete','Data delete successfully!');
      }
      public function admin_profile(){
         $address = address::where('id', Auth::user()->id)->first();
         return view('admin.profile', compact('address'));
      }


      public function customer(){
         $address = address::orderBy('id','DESC')->paginate(12);
         return view('admin.customer',compact('address'));
      }
      public function cus_detils_view($id){
         $customer_det = DB::select("
                              SELECT
                                 SUM(total) AS TotalAmount,
                                 SUM(IF(status = 'ordered', total, 0)) AS TotalOrderAmount,
                                 SUM(IF(status = 'delivered', total, 0)) AS TotalDeliveredAmount,
                                 SUM(IF(status = 'canceled', total, 0)) AS TotalCanceledAmount,
                                 COUNT(*) AS Total,
                                 SUM(IF(status = 'ordered', 1, 0)) AS TotalOrdered,
                                 SUM(IF(status = 'canceled', 1, 0)) AS TotalCanceled,
                                 SUM(IF(status = 'delivered', 1, 0)) AS TotalDelivered
                              FROM orders
                              WHERE user_id = ?
                        ", [$id]);
         $orders = order::where('user_id', $id)->orderBy('id')->paginate(10);
         $address = address::where('user_id', $id)->first();

         return view('admin.customer_details',compact('customer_det','orders','address'));
      }

      public function cus_delete($id){
         User::destroy($id);
         return back()->with('delete','Data delete successfully!');
      }
      public function order_details_delete($id){
         order::destroy($id);
         return back()->with('delete','Data delete successfully!');
      }

      public function even_management(){
         return view('admin.event_management');
      }
      public function invoice(){
         return view('admin.invoice');
      }
      public function add_invoice(){
         return view('admin.add_invoice');
      }
      public function pages(){
         $menus = menu::orderBy('id','ASC')->paginate(12);
         $sub_menus = sub_menu::with('menu')->paginate(12);
         return view('admin.pages',compact('menus','sub_menus'));
      }
      public function add_menu(){
         return view('admin.add_menu');
      }
      public function create_menu(Request $request){
         $request->validate([
            'name' => 'required|min:3',
        ]);

        $menu = new menu();
        $menu->name = $request->name;
        $menu->icon_name = $request->icon_name;
        $menu->link = $request->link;
        $menu->save();

        return redirect('pages')->with('success', 'Data inserted successfully.');

      }
      public function edit_menu($id){
         $menu = menu::findOrFail($id);
         return view('admin.edit_menu',compact('menu'));
      }
      public function update_menu($id,Request $request){
         $request->validate([
            'name' => 'required|min:3',
        ]);

        $menu = menu::find($id);
        $menu->name = $request->name;
        $menu->icon_name = $request->icon_name;
        $menu->link = $request->link;
        $menu->save();

        return redirect('pages')->with('update', 'Data updated successfully.');
      }
      public function delete_menu($id){
         menu::destroy($id);
         return back()->with('delete','Data delete successfully!');
      }
      public function add_submenu(){
         $menus = menu::orderBy('id')->get();
         return view('admin.add_sub_menu',compact('menus'));
      }
      public function create_submenu(Request $request){
         $request->validate([
            'name' => 'required|min:3',
            'menu_id' => 'required'
        ]);

        $sub_menu = new sub_menu();
        $sub_menu->name = $request->name;
        $sub_menu->link = $request->link;
        $sub_menu->menu_id = $request->menu_id;
        $sub_menu->save();

        return redirect('pages')->with('success', 'Data inserted successfully.');
      }
      public function edit_sub_menu($id){
         $menus = menu::orderBy('id','DESC')->paginate(12);
         $sub_menu = sub_menu::findOrFail($id);
         return view('admin.edit_sub_menu',compact('sub_menu','menus'));
      }
      public function update_submenu($id, Request $request){
         $request->validate([
            'name' => 'required|min:3',
        ]);

        $sub_menu = sub_menu::find($id);
        $sub_menu->name = $request->name;
        $sub_menu->link = $request->link;
        $sub_menu->menu_id = $request->menu_id;
        $sub_menu->save();
        return redirect('pages')->with('update', 'Data updated successfully.');
      }
      public function delete_sub_menu($id){
         sub_menu::destroy($id);
         return back()->with('delete','Data delete successfully!');
      }

      public function sales(){
          $orders = shop_order::orderBy('id','DESC')->with('shop_order_items')->with('shop_transection')->paginate(12);
          return view('admin.sales',compact('orders'));
      }
      public function add_sales(){
          $user = User::where('type','admin')->first();
          $address = address::where('user_id', $user->id)->with('User')->first();
         return view('admin.add_sales',compact('address'));
      }
      public function search_product(Request $request){
          $query = $request->get('query');
          $products = product::where('name', 'LIKE', "%{$query}%")->get();

          return response()->json($products);
      }

      public function add_sals_product(Request $request){
         $invoiceNumber = $this->generateInvoiceNumber();

         $order = new shop_order();
         $order->invoice = $invoiceNumber;
         $order->subtotal = $request->input('subtotal');
         $order->discount = $request->input('discount');
         $order->total = $request->input('total');
         $order->paid = $request->input('paid');
         $order->due = $request->input('due');
         $order->name = $request->input('issu_for_name');
         $order->phone = $request->input('issu_for_num');
         $order->email = $request->input('issu_for_email');
         $order->address = $request->input('issu_for_address');
         $order->save();


         $productIds = $request->input('product_id');
         $prices = $request->input('price');
         $quantities = $request->input('quantity');

         foreach ($productIds as $index => $productId){
            $order_item = new shop_order_items();
            $order_item->product_id = $productId;
            $order_item->order_id = $order->id;
            $order_item->price = $prices[$index];
            $order_item->quantity = $quantities[$index];
            $order_item->save();
         }

            $trasection = new shop_transection();
            $trasection->order_id = $order->id;
            $trasection->save();
         return back();
      }

      public function generateInvoiceNumber(){

         $date = date('Ymd');

         $lastInvoice = shop_order::latest()->first();

         if ($lastInvoice) {
            $lastNumber = (int)substr($lastInvoice->invoice_number, -4);
            $newNumber = $lastNumber + 1;
         } else {
            $newNumber = 1;
         }

         $invoiceNumber = 'INV-' . $date . '-' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);

         return $invoiceNumber;
      }

      public function edit_sales($id){
       $edit_data = shop_order::with('shop_order_items')->where('id', $id)->first();


        $user = User::where('type','admin')->first();
        $address = address::where('user_id', $user->id)->with('User')->first();
        return view('admin.edit_sales',compact('edit_data','address'));
      }
      public function hold_product(Request $request){
        return $request->input('data_s');
      }




   }
