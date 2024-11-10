<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Blog;
use Illuminate\Support\Str;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $kategori = ['Olahraga', 'Gadget', 'Politik', 'Pendidikan', 'Otomitif', 'Pakaian'];
        $tags = ['samsung', 'ortuseight', 'presiden', 'pindad', 'Coding', 'nike'];

        return [
            'judul' => $this->faker->sentence,
            'kategori' => $this->faker->randomElement($kategori),
            'tag' => implode(', ', $this->faker->randomElements($tags, 3)),
            'user_id' => '3', 
            'konten' => $this->faker->paragraph,
    
        ];
    }
}
