<?php

use Illuminate\Database\Seeder;
use App\Profiles\UserProfile;
use App\Profiles\UserRole;
use App\Profiles\Company;
use App\Profiles\CompanyProfile;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 3)->create()->each(function($user){
        	$user->profile()->save(factory(UserProfile::class)->make());
        });

        $company = Company::create(['name' => 'INKADDICT', 'industry' => 'Apparel/Screen Printing']);
        $profile = new CompanyProfile([
        	'email' => 'info@inkaddict.com',
        	'phone' => '855-465-2334',
        	'street_1' => '22007 Woodward Ave.',
        	'city' => 'Ferndale',
        	'state' => 'MI',
        	'zip' => '48220',
        	'country' => 'USA',
        ]);

        $company->profile()->save($profile);

        $user = User::create([
        	'name' => 'Jota Vares',
        	'email' => 'jota@inkaddict.com',
        	'password' =>  bcrypt('wordpass1'),
        ]);

        $user->profile()->save(new UserProfile([
        	'first_name' => 'Jota',
        	'last_name' => 'Vares',
        	'phone' => '313-515-5094',
        	'street_1' => '20407 Glenmore',
        	'city' => 'Redford',
        	'state' => 'MI',
        	'zip' => '48240',
        	'country' => 'USA'
        ]));

        $user->company()->associate($company)->save();

        $user->roles()->save(new UserRole(['role_value' => UserRole::GOD]));

    }
}
