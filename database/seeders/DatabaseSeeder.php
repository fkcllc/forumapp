<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Job;
use App\Models\User;
use App\Models\Role;
use App\Models\Profile;
use App\Models\Company;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(20)->create();
        // \App\Models\Company::factory(20)->create();

        // factory(App\User::class, 20)->create()->each(function ($user) {
        //     $user->profile()->save(factory(App\Profile::class)->make());
        // });
        User::factory()->count(20)->create()->each(function ($user) {
            $user->profile()->save(Profile::factory()->make());
        });

        // factory('App\Company', 20)->create();
        Company::factory()->count(20)->create();

        // -----------------------
            $categories = [
            '製造業',
            'IT業界',
            '医療・福祉',
            '運輸・物流',
            '販売・営業',
            '教育・研修',
            '飲食',
            '小売',
            '建設',
            'サービス業',
            '物流・運輸',
            '金融・保険',
            '不動産',
            '広告・マーケティング',
            'エネルギー',
            '通信',
            '農業・林業・漁業',
            '観光・レジャー',
            '公務員・行政',
            '研究・開発',
            '芸術・エンターテインメント',
            'その他'
        ];
        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
        // -----------------------

        // factory('App\Job', 20)->create();
        Job::factory()->count(20)->create();

        $adminRole = Role::create(['name' => 'admin']);
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => NOW()
        ]);
        $admin->roles()->attach($adminRole);
    }
}
