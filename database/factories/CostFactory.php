<?php

namespace Database\Factories;

use App\Models\Cost;
use Illuminate\Database\Eloquent\Factories\Factory;

class CostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company' => $this->faker->word,
        'item' => $this->faker->word,
        'item_code' => $this->faker->word,
        'item_code_2' => $this->faker->word,
        'quantity' => $this->faker->randomDigitNotNull,
        'item_cost' => $this->faker->word,
        'cost_type' => $this->faker->word,
        'unit_cost' => $this->faker->word,
        'extra_cost_2' => $this->faker->word,
        'extra_cost_3' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
