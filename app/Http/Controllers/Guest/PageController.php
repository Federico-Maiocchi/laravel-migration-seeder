<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Train;
// importo carbon
use Carbon\Carbon;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() 

    {   
        // Carbon::today() (data corrente) 2023-12-09 00:00:00
        $today = Carbon::today();

        // Carbon::tomorrow() (giorno dopo) 2023-12-10 00:00:00
        $tomorrow = Carbon::tomorrow();

        $trains = Train::where('departure_time','>', $today)
                        // operatore AND
                        ->where('departure_time','<', $tomorrow)
                        ->get();
        // dd($trains);

        return view('guest.home', compact('trains'));
    }
}


//Carbon è un libreria di php che lavora sulle date e le ore 

// Carbon::now() (data corrente) 2023-12-09 (ora corrente) 14:16:31

// Carbon::yesterday() (data di ieri) 2023-12-08 00:00:00