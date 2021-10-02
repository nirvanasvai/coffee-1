<?php
namespace App\Services\Device;

use App\Models\Device;

class DeviceService
{
	public function getCreateDevice($request)
	{
		return Device::query()->create([
			'name'=>$request->name,
			'filial_name'=>$request->filial_name,
			'company_id'=>$request->company_id,
			'code'=>$request->code,
			'cocoa'=>'100',
			'coffee'=>'100',
			'water'=>'100',
			'milk'=>'100',
			'status'=>10,
			'city_id'=>$request->city_id,
			'error_id'=>$request->error_id,
			'user_id'=>auth()->user()->id
		]);
	}
	
	public function getUpdateDevice($request,$device)
	{
		$device->name = $request->name;
		$device->filial_name = $request->filial_name;
		$device->company_id = $request->company_id;
		$device->code = $request->code;
		$device->cocoa = $request->cocoa;
		$device->coffee = $request->coffee;
		$device->water = $request->water;
		$device->milk = $request->milk;
		$device->status = $request->status;
		$device->city_id = $request->city_id;
		$device->error_id = $request->error_id;
		$device->user_id = auth()->user()->id;
		$device->update();
		
		return $device;
	}
}
