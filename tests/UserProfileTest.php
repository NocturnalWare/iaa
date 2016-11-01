<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserProfileTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function it_creates_user_profiles()
    {
		$user = factory(App\User::class)->create();
        $user->profile()->save(factory(App\Profiles\UserProfile::class)->make());

        $this->seeInDatabase('user_profiles', ['user_id' => $user->id]);
    }
}
