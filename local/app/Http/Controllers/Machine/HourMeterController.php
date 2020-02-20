<?php

namespace App\Http\Controllers\Machine;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HourMeterController extends Controller
{
  public function hour(Request $r)
  {
    // dd($r);
    $machine= \App\Models\Master\Machine::where('id',$r->id)->first();
    echo $machine->MachineHourMeter;
  }
}
