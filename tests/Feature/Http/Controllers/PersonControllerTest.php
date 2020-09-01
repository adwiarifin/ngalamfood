<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PersonControllerTest extends TestCase
{
    use WithFaker;

    public function test_store_data()
    {
        $firstName = $this->faker->firstName;
        $lastName = $this->faker->lastName;

        $response = $this->post(route('person.store'), [
            'first_name' => $firstName,
            'last_name' => $lastName,
        ]);

        $response
            ->assertStatus(201)
            ->assertJson([
                'id' => true,
                'first_name' => $firstName,
                'last_name' => $lastName,
                'created_at' => true,
                'updated_at' => true,
            ]);

        $content = $response->decodeResponseJson();
        return $content['id'];
    }

    public function test_get_all_data()
    {
        // $response = $this->get(route('person.index'));

        // $response
        //     ->assertStatus(200)
        //     ->assertJsonCount(1);
    }

    /**
     * @depends test_store_data
     */
    public function test_get_single_data_success($id)
    {
        $response = $this->get(route('person.show', ['id' => $id]));

        $response
            ->assertStatus(200);
    }

    /**
     * @depends test_store_data
     */
    public function test_update_data_success($id)
    {
        $firstName = $this->faker->firstName;
        $lastName = $this->faker->lastName;

        $response = $this->put(route('person.update', [
            'id' => $id,
            'first_name' => $firstName,
            'last_name' => $lastName,
        ]));

        $response
            ->assertStatus(200)
            ->assertJson([
                'id' => true,
                'first_name' => $firstName,
                'last_name' => $lastName,
                'created_at' => true,
                'updated_at' => true,
            ]);;
    }

    /**
     * @depends test_store_data
     */
    public function test_delete_data_success($id)
    {
        $response = $this->delete(route('person.delete', ['id' => $id]));

        $response
            ->assertStatus(204);
    }

    /**
     * @depends test_store_data
     */
    public function test_get_single_data_error($id)
    {
        $response = $this->get(route('person.show', ['id' => $id]));

        $response
            ->assertStatus(404);
    }

    /**
     * @depends test_store_data
     */
    public function test_delete_data_error($id)
    {
        $response = $this->delete(route('person.delete', ['id' => $id]));

        $response
            ->assertStatus(404);
    }

    /**
     * @depends test_store_data
     */
    public function test_update_data_error($id)
    {
        $response = $this->put(route('person.delete', ['id' => $id]));

        $response
            ->assertStatus(404);
    }
}
