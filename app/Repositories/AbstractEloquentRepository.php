<?php

namespace App\Repositories;

use App\Repositories\Contracts\AbstractEloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractEloquentRepository implements AbstractEloquentRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @var
     */
    protected $wheres;

    /**
     * @var
     */
    protected $query;

    /**
     *
     */
    public function __construct()
    {
        $this->model = $this->resolveModel();
    }

    /**
     * @return Model
     */
    abstract protected function resolveModel(): Model;

    /**
     * Summary of updateById
     * @param mixed $id
     * @param mixed $data
     * @return bool
     */
    public function updateById($id, $data): bool
    {
        $this->unMountQuery();

        return $this->model->find($id)->update($data);
    }

    /**
     * Summary of deleteById
     * @param mixed $id
     * @return array
     */
    public function deleteById($id): array
    {
        $this->model->find($id)->delete();

        return [
            'message' => 'deleted',
        ];
    }

    /**
     * Summary of find
     * @param mixed $id
     * @param mixed $columns
     * @return Model|Model[]|\Illuminate\Database\Eloquent\Collection|null
     */
    public function find($id, $columns = ['*'])
    {
        $this->unMountQuery();

        return $this->model->find($id, $columns);
    }

    /**
     * Summary of create
     * @param array $data
     * @return Model
     */
    public function create(array $data = [])
    {
        $this->unMountQuery();

        return $this->model->create($data);
    }

    /**
     * Summary of insert
     * @param array $data
     * @return bool
     */
    public function insert(array $data): bool
    {
        $this->unMountQuery();

        return $this->model->insert($data);
    }

    /**
     * Summary of all
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        $this->unMountQuery();

        return $this->model->all();
    }

    /**
     * Summary of where
     * @param string $column
     * @param mixed $value
     * @param string $operator
     * @return static
     */
    public function where(string $column, $value, string $operator = '=')
    {
        $this->wheres[] = compact('column', 'value', 'operator');

        return $this;
    }

    /**
     * Summary of whereNotNull
     * @param string $column
     * @return static
     */
    public function whereNotNull(string $column)
    {
        $value = '';
        $operator = "<>";
        $this->wheres[] = compact('column', 'value', 'operator');

        return $this;
    }

    /**
     * Summary of whereNull
     * @param string $column
     * @return static
     */
    public function whereNull(string $column)
    {
        $value = null;
        $operator = "=";
        $this->wheres[] = compact('column', 'value', 'operator');

        return $this;
    }

    /**
     * Summary of first
     * @param array $columns
     * @return Model|object|\Illuminate\Database\Eloquent\Builder|null
     */
    public function first(array $columns = ['*'])
    {
        $this->newQuery()->mountWhere();
        $model = $this->query->first($columns);
        $this->unMountQuery();

        return $model;
    }

    /**
     * Summary of get
     * @param array $columns
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function get(array $columns = ['*'])
    {
        $this->newQuery()->mountWhere();
        $models = $this->query->get($columns);
        $this->unMountQuery();

        return $models;
    }

    /**
     * Summary of count
     * @param array $columns
     * @return int
     */
    public function count(array $columns = ['*']): int
    {
        $this->newQuery()->mountWhere();
        $models = $this->query->get($columns);
        $this->unMountQuery();

        return count($models);
    }

    /**
     * Summary of update
     * @param array $values
     * @return int
     */
    public function update(array $values = [])
    {
        $this->newQuery()->mountWhere();
        $models = $this->query->update($values);
        $this->unMountQuery();

        return $models;
    }

    /**
     * Summary of firstOrNew
     * @param array $attributes
     * @param array $values
     * @return Model
     */
    public function firstOrNew(array $attributes, array $values = [])
    {
        return $this->model->firstOrNew($attributes, $values);
    }

    /**
     * Summary of updateOrCreate
     * @param array $attributes
     * @param array $values
     * @return Model
     */
    public function updateOrCreate(array $attributes, array $values = [])
    {
        return $this->model->updateOrCreate($attributes, $values);
    }

    /**
     * @return $this
     */
    public function newQuery()
    {
        $this->query = $this->model->newQuery();

        return $this;
    }

    /**
     * Summary of mountWhere
     * @return AbstractEloquentRepository|\Illuminate\Database\Eloquent\Builder
     */
    protected function mountWhere()
    {
        if (!is_array($this->wheres)) {
            return $this->query;
        }

        foreach ($this->wheres as $where) {
            $this->query->where($where['column'], $where['operator'], $where['value']);
        }

        return $this;
    }

    /**
     * @return void
     */
    protected function unMountQuery()
    {
        $this->wheres = null;
        $this->query = null;
    }
}
