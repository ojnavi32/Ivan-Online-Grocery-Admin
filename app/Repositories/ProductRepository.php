<?php

namespace App\Repositories;

use App\Models\Product;
use App\Services\CrudInterface;
use App\Traits\CommonRepoMethod;

class ProductRepository implements CrudInterface
{
    use CommonRepoMethod;

    protected $model;

    public $storeSuccess = 'Successfully created new Product';

    public $updateSuccess = 'Successfully updated the Product';

    public $deleteSuccess = 'Successfully deleted the Product';

    public function __construct()
    {
        $this->model = new Product;
    }

    public function store(array $data)
    {
        return $this->model->create($data)->categories()->attach($data['category_id']);
    }

    public function update(array $data)
    {
        return $this->get($data['id'])->update($data)->categories()->sync($data['category_id']);
    }

    public function attachCategories(int $id, array $categoryIds)
    {
        return $this->get($id)->categories()->attach($categoryIds);
    }

    public function single(string $productName)
    {
        return $this->model->where('name', $productName)->first();
    }

    public function byCategory(string $slug, $parent = false)
    {
        $category = $this->model
                ->where('stock', '>', 1)
                ->where('active', 1);
        
        if ($parent) {
            $category->whereHas('categories', function ($q) use ($slug) {
                $q->whereHas('parent', function ($w) use ($slug) {
                    $w->where('slug', $slug);
                });
            });
        }
        else {
            $category->whereHas('categories', function ($q) use ($slug) {
                $q->where('slug', $slug);
            });
        }

        return $category->get();
    }
}