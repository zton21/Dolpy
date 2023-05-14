<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\TopicSection;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'topicID' => TopicSection::all()->random()->id,
            'userID' => User::all()->random()->id,
            'chatContent' => fake()->sentence($nbWords = fake()->numberBetween($min = 3, $max = 20), $variableNbWords = true),
            'chatDate' => fake()->dateTimeThisYear(),
        ];
    }
}
