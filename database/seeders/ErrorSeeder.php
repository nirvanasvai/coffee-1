<?php

namespace Database\Seeders;

use App\Models\ErrorList;
use Illuminate\Database\Seeder;

class ErrorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ErrorList::query()->create([
        	'code'=>'f4',
			'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et iusto numquam omnis. Architecto commodi culpa eligendi quos ratione voluptates? Ab aliquam aspernatur culpa explicabo hic impedit, iusto quas quos sapiente'
		]);
    }
}
