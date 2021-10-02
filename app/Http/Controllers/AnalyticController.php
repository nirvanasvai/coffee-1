<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Test;
use Illuminate\Http\Request;

class AnalyticController extends Controller
{
	
	public function index()
	{
	    $a = Device::find(1);
	    $a->water = 13;
	    $a->update();
		return view('analytic.index');
	}
	
}
