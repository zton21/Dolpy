<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\FileSection;

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
            'attachmentName' => fake()->randomElement(['Tugas.png', 'Latihan.pdf', 'Presen.pptx']),
            'attachmentPath' => fake()->imageUrl($width = 640, $height = 480),
            'attachmentType' => fake()->randomElement(['image', 'link', 'file']),
            'attachmentDate' => fake()->dateTimeThisYear(),
            'attachmentSize' => fake()->randomElement(['10 KB', '1 KB', '4 MB']),
            'attachmentExtension' => fake()->randomElement(['DOCX', 'PDF', 'XLSX', 'PPTX', 'TXT']),
        ];
    }
}
