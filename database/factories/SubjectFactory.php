<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'subject_code' => $this->faker->regexify('[A-Z]{3}-\d{3}'),
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'instructor' => $this->faker->name,
            'schedule' => $this->faker->randomElement(['MWF 7AM-12PM', 'TTh 9AM-2PM', 'MW 1PM-5PM']),
            'grades' => [
                'prelims' => $this->faker->randomFloat(2, 1, 5),
                'midterms' => $this->faker->randomFloat(2, 1, 5),
                'pre_finals' => $this->faker->randomFloat(2, 1, 5),
                'finals' => $this->faker->randomFloat(2, 1, 5)
            ],
            'date_taken' => $this->faker->date('Y-m-d'),
        ];
    }
}
