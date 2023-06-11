<?php

namespace Src\Modules\Blogs\Categories\Infrastructure\Percistence\Eloquent\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;
use Src\Modules\Blogs\Categories\Domain\Model\ValueObjects\CategoryId;
use Src\Modules\Blogs\Categories\Domain\Model\ValueObjects\CategorySlug;
use Src\Modules\Blogs\Categories\Domain\Contracts\CategoryRepositoryContract;
use Src\Modules\Blogs\Categories\Infrastructure\Percistence\Eloquent\CategoryEloquentModel;

class CategoryRepository implements CategoryRepositoryContract
{
    /**
     * Model property
     *
     * @var CategoryModel
     */
    private CategoryEloquentModel $model;

    public function __construct()
    {
        $this->model = new CategoryEloquentModel;
    }

    /**
     * Retorna una coleccion del modelo consultado
     *
     * @param boolean $pluck
     * @param string|null $column
     * @param mixed $key
     * @return Collection|SupportCollection
     */
    public function getAllCategories(bool $pluck = false, string $column = null, mixed $key = null): SupportCollection|Collection
    {
        if (!$pluck) {
            return $this->model->all();
         } else {
            return $this->model->pluck($column, $key);
        }
    }

    /**
     * Obtiene la categoria y devuelve el modelo consultado
     *
     * @param mixed $category
     * @return Model|Collection|Builder
     */
    public function getCategory(mixed $category): Model|Collection|Builder
    {
        if (!is_int($category)) {
            $slug = (new CategorySlug($category))->value();
            return $this->model->firstWhere('slug', $slug);
        } else {
            $id = (new CategoryId($category))->value();
            return $this->model->find($id);
        }
    }

    /**
     * Recibe el request por separado y almacena los registros.
     *
     * @param $reqName
     * @param $reqSlug
     * @param integer|null $id
     * @return void
     */
    public function save($reqName, $reqSlug, int $id = null): void
    {
        $objectId = (new CategoryId($id))->value();
        $objectModel = $this->model->find($objectId);

        if (is_null($objectModel)) {
            $this->model->create([
                'name' => $reqName,
                'slug' => $reqSlug
            ]);
        } else {
            $objectModel->update([
                'name' => $reqName,
                'slug' => $reqSlug
            ]);
        }
    }

    /**
     * Obtiene el Modelo y lo elimina
     *
     * @param integer $id
     * @return void
     */
    public function deleteCategory(int $id): void
    {
        $objectId = (new CategoryId($id))->value();
        $objectModel = $this->model->find($objectId);

        $objectModel->delete();
    }
}
