<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Support\Facades\Storage;
use Src\Roles\Infrastructure\Eloquent\RoleModel;
use Src\Comments\Infrastructure\Eloquent\CommentModel;
use Src\Profiles\Infrastructure\Eloquent\ProfileModel;
use Src\Modules\Blogs\Tags\Infrastructure\Persistence\Eloquent\TagEloquentModel;
use Src\Modules\Blogs\Categories\Infrastructure\Percistence\Eloquent\CategoryEloquentModel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('posts');
        Storage::deleteDirectory('users');
        Storage::makeDirectory('posts');
        Storage::makeDirectory('users');

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        ProfileModel::factory(1)->create();
        CategoryEloquentModel::factory(5)->create();
        TagEloquentModel::factory(8)->create();
        $this->call(PostSeeder::class);
        CommentModel::factory(2)->create();
    }
}
