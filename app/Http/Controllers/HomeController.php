<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Company;
use App\Services\City\CityService;
use App\Services\User\UserCreateService;
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
    	$cities = City::query()->get();
        return view('city.home',compact('cities'));
    }
    public function home()
    {
    	$cities = City::query()->get();
        return view('city.index',compact('cities'));
    }

	public function create()
	{
		if (auth()->user()->role !=1)
			return redirect('city')->with('warning','У вас нет прав в данный раздел!');
		return view('city.create_city');
	}

	public function store(Request $request,CityService $service)
	{
		$service->getCreateCity($request);
		return redirect('city')->with('success','Успешно Добавлено!');
	}

	public function edit($id)
	{
		$city = City::query()->find($id);
		return view('city.edit',compact('city'));
	}

	public function update(Request $request,City $city,CityService $service)
	{
		$service->getUpdateCity($request,$city);

		return redirect('city')->with('success','Успешно Обновлено!');
	}

	public function destroy(City $city)
	{
		$city->delete();
		return back()->with('success','Успешно Удалено!');
	}
}
