<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\User;
use Faker\Provider\kk_KZ\Address;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name'=>'Admin',
			'email'=>'q@q.q',
			'password'=>bcrypt('12345dev'),
			'role'=>1
		]);
		
    }
}
