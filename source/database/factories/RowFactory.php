<?php

namespace Database\Factories;

use App\Models\Row;
use Illuminate\Database\Eloquent\Factories\Factory;

class RowFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Row::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fname' => $this->faker->name,
            'fdate' => $this->faker->date('Y-m-d')
        ];
    }

    
    public function date1()
    {
        return $this->state(function (array $attributes) {
            return [
                'fdate' => '2020-04-08',
            ];
        });
    }
    public function date2()
    {
        return $this->state(function (array $attributes) {
            return [
                'fdate' => '2020-03-08',
            ];
        });
    }
}
