<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Train;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() 
    {   
        $trains = Train::where('departure_time','>','2023-12-13 00:00:00')
                        ->where('departure_time','<','2023-12-13 23:59:59' )
                        ->get();
        // dd($trains);

        return view('guest.home', compact('trains'));
    }
}
