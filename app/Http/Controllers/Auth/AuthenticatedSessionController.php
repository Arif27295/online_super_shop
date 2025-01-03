<?php

namespace App\Http\Controllers\Auth;

use App\Models\menu;
use App\Models\category;
use App\Models\sub_menu;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $menus = menu::with('sub_menu')->orderBy('id','ASC')->get();
        $categories_list = category::orderBy('id','ASC')->get();
        return view('auth.login',compact('menus','categories_list'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if($request->user()->type === 'admin'){
            return redirect()->intended(route('admin_dashboard', absolute: false));
        }

        return redirect()->intended(route('user_dashboard', absolute: false));
 
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
