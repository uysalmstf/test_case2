<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class IntegrationTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_can_create_integration()
    {

        $integrationArr = ['hepsiburada', 'getir', 'trendyol'];
        $index = rand(0 , count($integrationArr) -1);

        $user = User::factory()->create();

        Passport::actingAs(
            User::factory()->create()
        );

        $data = [
            'integration' => $integrationArr[$index],
            'username' => "",
            'password' => ""
        ];

        $this->postJson(route('integration.store'), $data)
            ->assertStatus(201);

            $this->assertDatabaseHas('integration', [
                'integration' => $integrationArr[$index]
            ]);
    }

    public function test_can_update_integration()
    {

        $integrationArr = ['hepsiburada', 'getir', 'trendyol'];
        $index = rand(0 , count($integrationArr) -1);

        $user = User::factory()->create();

        Passport::actingAs(
            User::factory()->create()
        );

        $data = [
            'integration' => $integrationArr[$index],
            'username' => "",
            'password' => ""
        ];

        $this->putJson(route('integration.edit', 1), $data)
            ->assertStatus(201);

            $this->assertDatabaseHas('integration', [
                'integration' => $integrationArr[$index]
            ]);
    }

    public function test_can_delete_integration()
    {


        $user = User::factory()->create();

        Passport::actingAs(
            User::factory()->create()
        );

        $data = [
            'id' => 1
        ];

        $this->deleteJson(route('integration.del', 1), $data)
            ->assertStatus(201);
    }
}
