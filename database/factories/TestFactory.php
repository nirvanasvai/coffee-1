<?php

namespace Database\Factories;


use App\Models\Test;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Test::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->name,
            'filial_name'=>$this->faker->name,
            'company_id'=>rand(1,13),
			'code'=>$this->faker->unique->postcode,
			'milk'=>rand(0,100),
			'coffee'=>rand(0,100),
			'water'=>rand(0,100),
			'cocoa'=>rand(0,100),
			'city_id'=>rand(1,13),
			'user_id'=>2,
			'status'=>2,
			'error_id'=>rand(1111,9999),
        ];
    }
}
