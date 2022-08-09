<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('details')->insert([
            ['name' => 'Local'],
            ['name' => 'Global'],
            ['name' => 'Galactical'],
            ['name' => 'Universal'],
            ['name' => 'Metaversal'],
        ]);
    }
}
