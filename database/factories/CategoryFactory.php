<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
use Illuminate\Support\Str;
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name=fake()->word();
        return [
            'name_fr'=>$name.'_fr',
            'name_en'=>$name.'_en',
            'slug'=>Str::slug($name),


        ];
    }
}
