<?php

namespace App\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    /**
     * Model object.
     * 
     * @access protected
     * 
     * @var Illuminate\Database\Eloquent\Model $model.
     */
    protected $model;
    
    /**
     * Constructor.
     * 
     * @throws \Exception If model class didn't extend Illuminate\Database\Eloquent\Model.
     * 
     * @return void
     */
    public function __construct()
    {
        $model = resolve($this->getModelClass());

        if (!($model instanceof Model)) {
            throw new \Exception('Model class must will be extend Illuminate\Database\Eloquent\Model');
        }

        $this->model = $model;
    }

    /**
     * Get model class.
     * 
     * @abstract
     */    
    abstract public function getModelClass();

    /**
     * Find model by primary key or fail.
     * 
     * @param mixed $pk Primary key
     * 
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findByPkOrFail($pk)
    {
        return $this->model->findOrFail($pk);
    }

    /**
     * Find first model by condition.
     * 
     * @param string $columm Column name.
     * @param string $value  Value.
     * 
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function findWhereFirst($columm, $value)
    {
        return $this->model->where($columm, $value)->first();
    }

    /**
     * Find first model by condition or fail.
     * 
     * @param string $columm Column name.
     * @param string $value  Value.
     * 
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function findWhereFirstOrFail($columm, $value)
    {
        return $this->model->where($columm, $value)->firstOrFail();
    }

    /**
     * All model with pagination.
     * 
     * @param int $pagination Count model on page.
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function pagination($pagination = 20)
    {
        return $this->model->paginate($pagination);
    }

    /**
     * Model collection.
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function collection()
    {
        return $this->model->get();
    }

    /**
     * All models.
     * 
     * @return \Illuminate\Database\Eloquent\Model[]
     */
    public function all()
    {
        return $this->collection()->all();
    }

    /**
     * All model in array.
     * 
     * @return array
     */
    public function allToArray()
    {
        return $this->all()->toArray();
    }

    /**
     * Get collection models by where in condition.
     * 
     * @param string $column Column name.
     * @param array  $list   Search array data.
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function whereInCollection($column, $list)
    {
        return $this->model->whereIn($column, $list)->get();
    }

    /**
     * Create model.
     * 
     * @param array $fields Model fields.
     * 
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create($fields)
    {
        return $this->model->create($fields);
    }

    /**
     * Update model.
     * 
     * @param mixed $pk     Model primary key.
     * @param array $fields Model fields.
     */
    public function update($pk, $fields)
    {
        return $this->model->update($fields);
    }

    /**
     * Get model object.
     * 
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set model object.
     * 
     * @param Illuminate\Database\Eloquent\Model $model Model object.
     * 
     * @return void
     */
    public function setModel(Model $model)
    {
        $this->model = $model;
    }
}
