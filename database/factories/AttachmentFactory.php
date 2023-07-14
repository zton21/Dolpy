<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attachment>
 */
class AttachmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'file_id' => FileSection::all()->random()->id,
            'user_id' => User::all()->random()->id,
            'attachmentPath' => fake()->imageUrl($width = 640, $height = 480),
            'attachmentType' => fake()->randomElement(['image', 'link', 'doc']),
            'attachmentDate' => fake()->dateTimeThisYear(),
        ];
    }
}
