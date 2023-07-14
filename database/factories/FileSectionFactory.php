<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FileSection>
 */
class FileSectionFactory extends Factory
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
            'user_id' => User::all()->random()->id,
            'fileSectionName' => fake()->words(2,true),
            'fileSectionDate' => fake()->dateTimeThisYear(),
        ];
    }
}
