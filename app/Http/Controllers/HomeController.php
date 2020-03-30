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
    public function index()
    {
        if (Auth::user()->role == 'admin')
        {
            return redirect('/admin');
        };
        if (Auth::user()->role == 'client')
        {
            return redirect('/client');
        };
        if (Auth::user()->role == 'comptable')
        {
            return redirect('/comptable');
        };

    }
    public function adminIndex()
    {
        if (Auth::user()->role != 'admin')
        {
            return redirect('/permission-denied');
        };
        return view('admin');
    }
    public function clientIndex()
    {
        if (Auth::user()->role != 'client')
        {
            return redirect('/permission-denied');
        };
        return view('client');
    }
    public function comptableIndex()
    {
        if (Auth::user()->role != 'comptable')
        {
            return redirect('/permission-denied');
        };
        return view('comptable');
    }
    public function permissionDenied()
    {
        return view('nopermission');
    }
}
