<?php

namespace App\Services\User;

class RoleService
{
	public function getRoleUser()
	{
		return (object)[
			'1' => 'Пользователь',
			'2' => 'Администратор',
		];
	}
}
