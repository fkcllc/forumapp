<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
    $faker = $this->faker;
    $title = $faker->text();

    return [
        'user_id' => User::all()->random()->id,
        'company_id' => Company::all()->random()->id,
        'category_id' => Category::all()->random()->id,
        'title' => $title,
        'slug' => Str::slug($title),
        'description' => $faker->paragraph(rand(2, 20)),
        'role' => $faker->name(),
        'position' => $faker->jobTitle,
        'address' => $faker->address,
        'type' => 'fulltime',
        'status' => rand(0, 1),
        'last_date' => $faker->dateTime(),
        'number_of_vacancy' => rand(1, 10),
        'experience' => rand(1, 10),
        'gender' => $faker->randomElement(['male', 'female']),
        'salary' => rand(500000, 1200000)
    ];
    }
}
