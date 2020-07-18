<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PersonControllerTest extends TestCase
{
    use WithFaker;

    /**
     * @test
     */
    public function it_should_store_data()
    {
        $firstName = $this->faker->firstName;
        $lastName = $this->faker->lastName;

        $response = $this->post(route('person.store'), [
            'first_name' => $firstName,
            'last_name' => $lastName,
        ]);

        var_dump($response);
        $response
            ->assertStatus(201)
            ->assertJson([
                'id' => true,
                'first_name' => $firstName,
                'last_name' => $lastName,
                'created_at' => true,
                'updated_at' => true,
            ]);
    }
}
