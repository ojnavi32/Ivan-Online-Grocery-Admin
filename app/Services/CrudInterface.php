<?php

namespace App\Services;

Interface CrudInterface
{
	public function store(array $data);

    public function delete(int $id);

    public function update(array $data);

    public function get(int $id);

}