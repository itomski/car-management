<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Str;

class SampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('de_DE');

        for($i = 0; $i < 10; $i++) {
            DB::table('samples')->insert([
                'name' => $faker->firstName.' '.$faker->lastName,
                'count' => $faker->numberBetween(20,100),
                'description' => $faker->text,
                'enabled' => $faker->randomElement([true, false]),
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
            ]);
        }

        $this->command->info('SampleSeeder wurde ausgeführt.');
    }
}
