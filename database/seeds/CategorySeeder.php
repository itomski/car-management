<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
            ['name' => 'Kleinwagen', 'short_name' => 'KW'],
            ['name' => 'Mittelklasse', 'short_name' => 'MK'],
            ['name' => 'Oberklasse', 'short_name' => 'OK'],
            ['name' => 'Luxuswagen', 'short_name' => 'LW'],
            ['name' => 'VIP-Cars', 'short_name' => 'VIP'],
        ];

        foreach($arr as $r) {
            App\Category::create($r);
        }
        // factory(App\Category::class, 5)->create();
    }
}
