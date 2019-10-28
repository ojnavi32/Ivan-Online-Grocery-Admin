<?php

namespace App\Repositories;

use App\Models\Category;
use App\Services\CrudInterface;
use App\Traits\CommonRepoMethod;

class CategoryRepository implements CrudInterface
{
    use CommonRepoMethod;

    protected $model;

    public $storeSuccess = 'Successfully created new Category';

    public $updateSuccess = 'Successfully updated the Category';

    public $deleteSuccess = 'Successfully deleted the Category';

    public function __construct()
    {
        $this->model = new Category;
    }

    public function parentsList($withChildren = false)
    {
        $model = $this->model->where('parent_id', 0);

        if ($withChildren)
            $model->with('children');

        return $model->get();
    }

    public function childList(string $slug)
    {
        return $this->model->where('slug', $slug)
                ->with('children')
                ->first();
    }
}