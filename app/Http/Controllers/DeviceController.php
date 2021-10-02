<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Company;
use App\Models\Device;
use App\Models\ErrorList;
use App\Services\Device\DeviceService;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index()
	{
		$devices = Device::query()->get();
		return view('device.index',compact('devices'));
	}
	
	
	
	public function innerCity($slug)
	{
		$city = City::query()->where('slug',$slug)->firstOrFail();
//		$companies = Company::query()->where('city_id',$city->id)->get();
//		$device = Device::query()->where('company_id',$companies[0]->id)->get();

//		dd($device);
		
		return view('device.inner',compact('city',));
	}
	
	public function innerDevice($id)
	{
		$device = Device::query()->where('id',$id)->firstOrFail();
		
		return view('device.inner_device',compact('device'));
	}
	public function create()
	{
		$cities = City::query()->get();
		$errorLists = ErrorList::query()->get();
		$company = Company::query()->get();
		if (auth()->user()->role !=1)
			return redirect('device')->with('warning','У вас нет прав в данный раздел!');
			return view('device.create',compact('cities','errorLists','company'));
		
	}
	
	public function store(Request $request,DeviceService $deviceService)
	{
		$deviceService->getCreateDevice($request);
		
		return redirect('device')->with('success','Успешно Создан!');
	}
	
	public function edit($id)
	{
		$device = Device::query()->findOrFail($id);
		$cities = City::query()->get();
		$errorLists = ErrorList::query()->get();
		$company = Company::query()->get();
		return view('device.edit',compact('device','cities','company','errorLists'));
	}
	public function update(Request $request,DeviceService $deviceService,Device $device)
	{
		$deviceService->getUpdateDevice($request,$device);
		
		return redirect('device')->with('success','Успешно Обновлено!');
	}
}
