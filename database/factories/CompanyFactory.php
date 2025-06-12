<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
// use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
    $faker = $this->faker;
    $cname = $faker->company;
    return [
        'user_id' => User::all()->random()->id,
        'cname' => $cname,
        'slug' => Str::slug($cname),
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'website' => $faker->domainName,
        'logo' => '',
        'cover_photo' => '',
        'slogan' => 'text-text and text',
        'description' => $faker->paragraph(rand(2, 20)),
    ];
    }
}
