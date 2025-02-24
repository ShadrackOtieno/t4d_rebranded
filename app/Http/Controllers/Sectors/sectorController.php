<?php

namespace App\Http\Controllers\Sectors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class sectorController extends Controller
{
    //
    public function forestry(){
        return view('sectors/forestry');
    }


    public function tourism(){
        return view('sectors/tourism');
    }


    public function manufacturing(){
        return view('sectors/manufacturing');
    }
    public function statistics(){
        return view('sectors/statistics');
    }
    public function economy(){
        return view('sectors/economy');
    }
    public function real_estate(){
        return view('sectors/real_estate');
    }
    public function lands(){
        return view('sectors/lands');
    }
    public function health(){
        return view('sectors/health');
    }
    public function fisheries(){
        return view('sectors/fisheries');
    }

    public function energy(){
        return view('sectors/energy');
    }
    public function water(){
        return view('sectors/water');
    }
    public function trade(){
        return view('sectors/trade');
    }
    public function BFSI(){
        return view('sectors/BFSI');
    }
    public function retail(){
        return view('sectors/retail');
    }
    public function gender(){
        return view('sectors/gender');
    }
    public function oil_gas(){
        return view('sectors/oil_gas');
    }
    public function education(){
        return view('sectors/education');
    }
    public function governance(){
        return view('sectors/governance');
    }
    public function hospitality(){
        return view('sectors/hospitality');
    }
    public function transport(){
        return view('sectors/transport');
    }
    public function organizations(){
        return view('sectors/organizations');
    }
    public function ict(){
        return view('sectors/ict');
    }

}
