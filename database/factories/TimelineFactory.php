<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ProjectHeader;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Timeline>
 */
class TimelineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'project_id' => ProjectHeader::all()->random()->id,
            'timelineTitle' => fake()->words(2,true),
            'timelineDesc' => fake()->sentence($nbWords = fake()->numberBetween($min = 3, $max = 6), $variableNbWords = true),
        ];
    }
}
