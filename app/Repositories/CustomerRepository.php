<?php

namespace App\Repositories;

use App\Models\User;
use App\Services\CrudInterface;
use App\Traits\CommonRepoMethod;

class CustomerRepository implements CrudInterface
{
    use CommonRepoMethod;

    protected $model;

    public $storeSuccess = 'Successfully created new Customer';

    public $updateSuccess = 'Successfully updated the Customer';

    public $deleteSuccess = 'Successfully deleted the Customer';

    public function __construct()
    {
        $this->model = new User;
    }

    public function paginatedList($items = 10)
    {
        return $this->model
                ->with('details')
                ->whereHas('roles', function ($q) {
                    $q->where('name', 'customer');
                })->paginate($items);
    }
}