<?php
/**
 * Created by PhpStorm.
 * User: yoel
 * Date: 11/02/15
 * Time: 0:19
 */

namespace App\Repositories;

abstract class BaseRepo {

    abstract public function getModel();

    public function findOrFail($id)
    {
        return $this->getModel()->findOrFail($id);
    }

    public function findByField($field,$value)
    {
        return $this->getModel()->where($field,$value)->get();
    }

    public function findByFieldGetFirst($field,$value)
    {
        return $this->getModel()->where($field,$value)->get()->first();
    }

    public function create(array $data)
    {
        return $this->getModel()->create($data);
    }

    public function update($entity,array $data)
    {
        $entity->fill($data);
        $entity->save();
        return $entity;
    }

    public function delete($entity)
    {
        if (is_numeric($entity))
        {
            $entity = $this->findOrFail($entity);
        }

        $entity->delete();
        return $entity;
    }

    public function getAll()
    {
        return $this->getModel()->all();
    }
}