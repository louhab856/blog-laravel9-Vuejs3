<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => "admin",
            'email' =>"admin@admin.com",
            'email_verified_at' => now(),
            'password' => Hash::make("admin1234"),
            'remember_token' => \Illuminate\Support\Str::random(10), 
        ];
    }
}
