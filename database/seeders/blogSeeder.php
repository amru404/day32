<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;


class blogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog::factory()->count(30)->create();
    }
}
