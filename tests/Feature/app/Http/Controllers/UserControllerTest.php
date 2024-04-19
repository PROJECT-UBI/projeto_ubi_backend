<?php

namespace Tests\Feature\app\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testStoreSuccess(): void
    {
        $user = User::factory()->make()->toArray();
        $response = $this->postJson('/api/user', $user);
        $response->assertCreated()
            ->assertJson(['message' => 'User created successfully'])
            ->assertJsonStructure(['message']);

        $this->assertDatabaseHas(User::class, [
            'name' => $user['name'],
            'last_name' => $user['last_name'],
            'email' => $user['email'],
        ]);
    }

    #[DataProvider('userDataProvider')]
    public function testStoreFail(array $data): void
    {
        $response = $this->postJson('/api/user', $data);
        $response->assertStatus(422);

        $this->assertDatabaseMissing(User::class, $data);
    }

    public static function userDataProvider(): array
    {
        return [
            'name is required' =>
                [
                    [
                        'last_name' => fake()->lastName(),
                        'email' => fake()->unique()->safeEmail(),
                        'password' => fake()->password()
                    ]
                ],
            'last_name is required' =>
                [
                    [
                        'name' => fake()->name(),
                        'email' => fake()->unique()->safeEmail(),
                        'password' => fake()->password()
                    ]
                ],
            'email is required' =>
                [
                    [
                        'name' => fake()->name(),
                        'last_name' => fake()->lastName(),
                        'password' => fake()->password()
                    ]
                ],
            'password is required' =>
                [
                    [
                        'name' => fake()->name(),
                        'last_name' => fake()->lastName(),
                        'email' => fake()->unique()->safeEmail()
                    ]
                ],
        ];
    }
}
