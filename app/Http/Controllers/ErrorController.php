<?php

namespace App\Http\Controllers;

use App\Models\ErrorList;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$errorLists = ErrorList::query()->paginate(10);
        return view('error.index',compact('errorLists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('error.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ErrorList::query()->create([
        	'code'=>$request->code,
			'description'=>$request->description
		]);
        
        return redirect('error')->with('success','Успешно Создан!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ErrorList  $errorList
     * @return \Illuminate\Http\Response
     */
    public function show(ErrorList $errorList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ErrorList  $errorList
     * @return \Illuminate\Http\Response
     */
    public function edit(ErrorList $errorList)
    {
		return view('error.edit',compact('errorList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ErrorList  $errorList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ErrorList $errorList)
    {
        $errorList->code = $request->code;
        $errorList->description = $request->description;
        
        $errorList->update();
        
        return redirect('error')->with('success','Успешно Обновлено!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ErrorList  $errorList
     * @return \Illuminate\Http\Response
     */
    public function destroy(ErrorList $errorList)
    {
        $errorList->delete();
        return back()->with('success','Успешно Удалено!');
    }
}
