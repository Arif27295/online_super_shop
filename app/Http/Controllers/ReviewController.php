<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\order;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'review' => 'nullable|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create([
            'product_id' => $request->product_id,
            'user_id' => Auth::user()->id,
            'review' => $request->review,
            'rating' => $request->rating,
        ]);

        return redirect()->back()->with('success', 'Thank you for your review!');
    }




    // public function test(){

    //     $lastMonth = Carbon::now()->subMonth()->month;
    //     $currentYear = Carbon::now()->year;

    //     $orders = order::whereMonth('created_at', $lastMonth)
    //                     ->whereYear('created_at', $currentYear)
    //                     ->get();
        
    //     return $orders;

    // }

}
