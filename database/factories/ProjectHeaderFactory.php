<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProjectHeader>
 */
class ProjectHeaderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'projectName' => fake()->words(2, true),
            'projectDueDate' => fake()->dateTimeThisYear(),
            'projectDescription' => fake()->sentence($nbWords = fake()->numberBetween($min = 3, $max = 6), $variableNbWords = true),
            'projectStatus' => fake()->randomElement(['In Progress', 'Developing', 'Designing', 'Implementing']),
            'projectWallpaperURL' => fake()->randomElement(['img/project_wallpaper/Wallpaper1.png', 'img/project_wallpaper/Wallpaper2.png', 'img/project_wallpaper/Wallpaper3.png']),
        ];
    }
}
