<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id'=>'1',
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'logo' =>$this->faker->name(),
            'website' => $this->faker->name(),
        ];
    }
}
