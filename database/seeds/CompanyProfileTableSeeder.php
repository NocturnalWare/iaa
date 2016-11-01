<?php

use Illuminate\Database\Seeder;

class CompanyProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Profiles\CompanyProfile::class, 3)->create();
    }
}
