<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Faker\Generator as Faker; // Import Faker
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
    ////$faker = $this->faker;
    $faker = \Faker\Factory::create('ja_JP');
    $faker1 = \Faker\Factory::create('en_US'); // 英語のFakerインスタンスを作成
    // $title = $faker->text();
    $title = $faker->realText(50); // 50文字程度の日本語テキスト

    return [
        'user_id' => User::all()->random()->id,
        'company_id' => Company::all()->random()->id,
        'category_id' => Category::all()->random()->id,
        'title' => $title,
        'slug' => Str::slug($title),
        'description' => $faker->paragraph(rand(2, 20)),
        'role' => $faker->name(),
        'position' => $faker1->jobTitle(),
        'address' => $faker->address,
        'type' => $faker->randomElement(['アルバイト'],['正社員'],['嘱託社員'],['契約社員'],['派遣社員'],['パート']),
        'status' => rand(0, 1),
        'last_date' => $faker->dateTimeBetween('now', '+30 days'),  //$faker->dateTime(),
        'number_of_vacancy' => rand(1, 10),
        'experience' => rand(1, 10),
        'gender' => $faker->randomElement(['male', 'female']),
        'salary' => rand(500000, 1200000)
    ];
    }
}
