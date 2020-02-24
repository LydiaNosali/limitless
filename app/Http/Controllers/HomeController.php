<?php

namespace App\Http\Controllers;

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
     * @return \Illuminate\View\View
     */
    public function adminIndex()
    {
        if (!Auth::user()->role == 'admin')
        {
            return redirect('/permission-denied');
        };
        return view('admin');
    }
    public function clientIndex()
    {
        return view('client');
    }
    public function comptableIndex()
    {
        return view('comptable');
    }
    public function permissionDenied()
    {
        return view('nopermission');
    }
}
