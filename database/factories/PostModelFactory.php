<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Modules\Blogs\Posts\Infrastructure\Persistence\Eloquent\PostEloquentModel;
use Src\Modules\Blogs\Categories\Infrastructure\Percistence\Eloquent\CategoryEloquentModel;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostModelFactory extends Factory
{
    /**
     * El nombre del Factory correspondiente al Model
     *
     * @var string
     */
    protected $model = PostEloquentModel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence(10);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'extract' => $this->faker->text(250),
            'body' => $this->faker->text(2000),
            'status' => $this->faker->randomElement([1, 2]),
            'category_id' => CategoryEloquentModel::all()->random()->id,
            'user_id' => User::all()->random()->id
        ];
    }
}
