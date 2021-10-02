<?php
namespace App\Services\City;

use App\Models\City;
use Illuminate\Support\Carbon;

class CityService
{
	public function getCreateCity($request)
	{
		$data = new City();
		$data->name = $request->name;
		$data->save();
		
		return $data;
	}
	public function getUpdateCity($request,$city)
	{
		$city->name = $request['name'];
		if (isset($city->slug)) {
		    $city->slug = $request['slug'];
		}
		$city->save();
		
		return $city;
	}
}
