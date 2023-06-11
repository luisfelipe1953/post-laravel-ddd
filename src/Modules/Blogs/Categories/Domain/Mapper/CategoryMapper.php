<?php

namespace Src\Modules\Blogs\Categories\Domain\Mapper;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Authenticatable;
use Src\Modules\Blogs\Categories\Domain\Model\Category;
use Src\Modules\Blogs\Categories\Domain\Model\ValueObjects\CategoryName;
use Src\Modules\Blogs\Categories\Domain\Model\ValueObjects\CategorySlug;
use Src\Modules\Blogs\Categories\Infrastructure\Percistence\Eloquent\CategoryEloquentModel;

class CategoryMapper
{
    public static function fromRequest(Request $request, ?int $category_id = null): Category
    {
        return new Category(
            id: $category_id,
            name: new CategoryName($request->string('name')),
            slug: new CategorySlug($request->string('slug')),
        );
    }

    public static function fromEloquent(CategoryEloquentModel $categoryEloquentModel): Category
    {
        return new Category(
            id: $categoryEloquentModel->id,
            name: new CategoryName($categoryEloquentModel->name),
            slug: new CategorySlug($categoryEloquentModel->slug),
        );
    }

    public static function fromAuth(Authenticatable $categoryEloquentModel): Category
    {
        return new Category(
            id: $categoryEloquentModel->id,
            name: new CategoryName($categoryEloquentModel->name),
            slug: new CategorySlug($categoryEloquentModel->slug),
         );
    }

    public static function toEloquent(Category $category): CategoryEloquentModel
    {
        $categoryEloquentModel = new CategoryEloquentModel();

        if ($category->id) {
            $categoryEloquentModel = CategoryEloquentModel::query()->findOrFail($category->id);
        }
        $categoryEloquentModel->name = $category->name;
        $categoryEloquentModel->email = $category->slug;
        return $categoryEloquentModel;
    }
}