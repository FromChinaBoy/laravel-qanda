<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        var_export((INT)(199.90 * 100));exit;
        var_dump($request->user());
        // 获取当前通过认证的用户...
        $user = Auth::user();

//  获取当前通过认证的用户 ID...
        $id = Auth::id();
        var_dump($user->toArray());
        var_dump($id);exit;
        return view('home');
    }
}
