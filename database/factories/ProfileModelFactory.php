<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Modules\Auth\Infrastructure\Persistence\Eloquent\UserEloquentModel;
use Src\Profiles\Infrastructure\Eloquent\ProfileModel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileModelFactory extends Factory
{
    /**
     * El nombre del Factory correspondiente al Model
     *
     * @var string
     */
    protected $model = ProfileModel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->word(),
            'biography' => $this->faker->unique()->sentence(),
            'website' => $this->faker->url(),
            'user_id' => UserEloquentModel::all()->random()->id
        ];
    }
}
