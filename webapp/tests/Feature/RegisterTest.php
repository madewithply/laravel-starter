<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use Faker\Factory;

class RegisterTest extends TestCase
{

    use DatabaseTransactions;


    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCanRegisterCandidate()
    {

        $this->assertTrue(true);

    }

    private function prepareCorrectUserPostData()
    {

        $faker = Factory::create();

        // Setup the user
        $firstName = $faker->firstName;
        $lastName = $faker->lastName;
        $email = $faker->email;
        $password = $faker->password(10);

        // Setup the post data
        $post_data = [
            "first_name" => $firstName,
            "last_name" => $lastName,
            "email" => $email,
            'password' => $password,
            'password_confirmation' => $password,
            '_token' => csrf_token()
        ];

        return $post_data;

    }
}
