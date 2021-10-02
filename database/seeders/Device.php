<?php

namespace Database\Seeders;

use App\Models\Test;
use Faker\Provider\Text;
use Illuminate\Database\Seeder;
use App\Models\Device as T;
use Illuminate\Support\Facades\App;

class Device extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Test::factory()->count(50)->create();
    }
}
