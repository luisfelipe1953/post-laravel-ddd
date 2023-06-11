<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Modules\Blogs\Tags\Infrastructure\Persistence\Eloquent\TagEloquentModel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagModelFactory extends Factory
{
    /**
     * El nombre del Factory correspondiente al Model
     *
     * @var string
     */
    protected $model = TagEloquentModel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->unique()->word();
        return [
            'name' => $name,
            'slug' => $name,
            'color' => $this->faker->randomElement(['red', 'blue', 'yellow', 'indigo', 'purple', 'green'])
        ];
    }
}
