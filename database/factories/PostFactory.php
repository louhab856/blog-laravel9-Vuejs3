<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title=fake()->sentence();
        return [
            'title_fr'=>$title.'_fr',
            'title_en'=>$title.'en',
            'body_fr'=>fake()->sentence().'_fr',
            'body_en'=>fake()->sentence().'_en',
            'slug'=>\Illuminate\Support\Str::slug($title),
            'photo'=>fake()->imageUrl(1040,680),
            'category_id'=>Category::all()->random()->id,
            'admin_id'=>1,

        ];
    }
}
