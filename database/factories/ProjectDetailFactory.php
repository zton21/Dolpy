<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\ProjectHeader;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectDetail>
 */
class ProjectDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'projectID' => ProjectHeader::all()->random()->id,
            'userID' => User::all()->random()->id,
            'role' => fake()->randomElement(['Creator', 'Member']),
        ];
    }
}
