<?php
namespace App\Services\User;

use App\Models\User;

class UserCreateService
{
	
	public function getCreateUser($request)
	{
		return User::create([
			'name' => $request['name'],
			'email' => $request['email'],
			'password' => bcrypt($request['password']),
			'role' => $request['role']
		]);
	}
	public function getUpdateUser($request,$user)
	{
		$user->name = $request['name'];
		$user->email = $request['email'];
		$user->role = $request['role'];
		if($request['password']){
			$user->password = bcrypt($request['password']);
		}
		
		$user->save();
		
		return $user;
	}
}
