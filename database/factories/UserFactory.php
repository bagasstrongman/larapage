<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        static $password;

        return [
            'name'              => $this->faker->name(),
            'email'             => $this->faker->unique()->safeEmail(),
            'password'          => $password ?: $password = 'password',
            'api_token'         => Str::random(60),
            'remember_token'    => Str::random(10),
            'email_verified_at' => now(),
        ];
    }

    /**
     * Indicate that the user is Lara Page.
     */
    public function defaultLarapageUser(): Factory
    {
        return $this->state(function () {
            return [
                'name'  => 'Lara Page',
                'email' => 'larapage@larapage.org',
            ];
        });
    }
}
