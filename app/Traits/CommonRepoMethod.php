<?php

namespace App\Traits;

trait CommonRepoMethod
{
    public function all()
    {
        return $this->model->all();
    }

    public function store(array $data)
    {
        return $this->model->create($data);
    }

    public function delete(int $id)
    {
        return $this->get($id)->delete();
    }

    public function update(array $data)
    {
        return $this->get($data['id'])->update($data);
    }

    public function get(int $id)
    {
        return $this->model->find($id);
    }

    public function paginatedList($items = 10)
    {
        return $this->model->paginate($items);
    }

    public function getFillables()
    {
        return $this->model->getFillables();
    }

    public function getWithRelationships(int $id, string $relationships)
    {
        return $this->model
                    ->find($id)
                    ->with(explode(',', str_replace(' ', '', $relationships)));
    }

    public function findyBy(array $data)
    {
        return $this->model->where($data)->first();
    }
}