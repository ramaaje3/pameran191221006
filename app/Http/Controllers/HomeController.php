<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Loan;
use App\User;
use App\Vehicle;
use Illuminate\Http\Request;

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
    public function index()
    {
        $users = User::count();
        $drivers = Driver::count();
        $vehicles = Vehicle::count();
        $loans = Loan::where('status_id', '1')->count();
        $loanss = Loan::where('status_id', '3')->count();

        $widget = [
            'users' => $users,
            'drivers' => $drivers,
            'vehicles' => $vehicles,
            'loans' => $loans,
            'loanss' => $loanss,
            //...
        ];

        return view('home', compact('widget'));
    }
}
