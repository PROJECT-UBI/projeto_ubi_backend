<?php

namespace App\Repositories\Contracts;

interface AbstractEloquentRepositoryInterface
{
    public function updateById($id, $data): bool;
    public function deleteById($id): array;
    public function all();

    public function find($id, array|string $columns = ['*']);

    public function create(array $data = []);

    public function where(string $attribute, $value, string $operator = '=');

    public function get(array $columns = ['*']);

    public function first(array $columns = ['*']);

    public function firstOrNew(array $values);

    public function updateOrCreate(array $attributes, array $values = []);
}
