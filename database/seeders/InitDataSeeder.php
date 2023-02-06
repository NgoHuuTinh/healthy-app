<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Food;
use App\Models\User;
use App\Models\Exercise;
use App\Models\FoodUser;
use App\Models\DiaryUser;
use App\Models\ExerciseUser;
use App\Models\UserStatistic;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InitDataSeeder extends Seeder
{
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            for ($i = 0; $i < 100; $i++) {
                Exercise::create([
                    'name' => $this->faker->name(),
                    'image' => $this->faker->imageUrl(),
                    'overview' => $this->faker->text(300),
                    'guide' => $this->faker->text(300),
                    'caution' => $this->faker->text(300),
                    'calo_minus' => $this->faker->numberBetween(100, 1000)
                ]);

                Food::create([
                    'name' => $this->faker->name(),
                    'image' => $this->faker->imageUrl(),
                    'calo_gram' => $this->faker->numberBetween(10, 100)
                ]);
            }
            $user = User::create([
                'name' => 'TONY NGO',
                'username' => 'test@me',
                'password' => bcrypt('changeme')
            ]);
            $foods = Food::all();
            $data = [];
            foreach ($foods as $food) {
                $data[] = [
                    'user_id' => $user->id,
                    'food_id' => $food->id,
                    'genre_id' =>  $this->faker->numberBetween(0, 3),
                    'date' => $this->faker->dateTimeBetween('-1 month', 'now', 'Asia/Ho_Chi_Minh'),
                    'gram' => $this->faker->numberBetween(1, 1000)
                ];
            }
            FoodUser::insert($data);
            // create DailyUserStatistic
            for ($i = 0; $i <= 365; $i++) {
                $target = $this->faker->numberBetween(1000, 10000);
                $reality = $this->faker->numberBetween(1000, $target);
                UserStatistic::create([
                    'user_id' => 1,
                    'statistic_type' => 0,
                    'date' => Carbon::today()->subYear(1)->addDay($i),
                    'target' => $target,
                    'reality' => $reality,
                    'reality_percent' => intval($reality / $target * 100)
                ]);
            }
            // create WeeklyUserStatistic
            for ($i = 0; $i < 12; $i++) {
                $target = $this->faker->numberBetween(10000, 100000);
                $reality = $this->faker->numberBetween(10000, $target);
                UserStatistic::create([
                    'user_id' => 1,
                    'statistic_type' => 1,
                    'date' => Carbon::today()->subMonth(4)->addWeek($i),
                    'target' => $target,
                    'reality' => $reality,
                    'reality_percent' => intval($reality / $target * 100)
                ]);
            }
            // create MonthlyUserStatistic
            for ($i = 0; $i <= 12; $i++) {
                $target = $this->faker->numberBetween(100000, 1000000);
                $reality = $this->faker->numberBetween(1000000, $target);
                UserStatistic::create([
                    'user_id' => 1,
                    'statistic_type' => 2,
                    'date' => Carbon::today()->startOfYear()->subYear(1)->addMonth($i),
                    'target' => $target,
                    'reality' => $reality,
                    'reality_percent' => intval($reality / $target * 100)
                ]);
            }
            // create YearlyUserStatistic
            for ($i = 0; $i <= 12; $i++) {
                $target = $this->faker->numberBetween(1000000, 10000000);
                $reality = $this->faker->numberBetween(1000000, $target);
                UserStatistic::create([
                    'user_id' => 1,
                    'statistic_type' => 3,
                    'date' => Carbon::today()->subYear(12)->addYear($i),
                    'target' => $target,
                    'reality' => $reality,
                    'reality_percent' => intval($reality / $target * 100)
                ]);
            }
            // create ExerciseUser
            for ($i = 0; $i < 10; $i++) {
                ExerciseUser::create([
                    'user_id' => 1,
                    'exercise_id' => $this->faker->numberBetween(1, 100),
                    'date' => Carbon::now(),
                    'minute' => $this->faker->numberBetween(10, 20)
                ]);
            }
            // create DiaryUser
            for ($i = 0; $i < 10; $i++) {
                DiaryUser::create([
                    'user_id' => 1,
                    'type_id' => $this->faker->numberBetween(0, 1),
                    'date' => Carbon::now()
                ]);
            }
        });
    }
}
