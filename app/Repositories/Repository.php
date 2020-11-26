<?php

namespace App\Repositories;

abstract class Repository
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * Construtor da classe.
     */
    public function __construct()
    {
        //
    }

    /**
     * Resgata um item baseado no id.
     *
     * @param  integer $id
     * @return Illuminate\Database\Eloquent\Model
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * Retorna todos os registros.
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Grava os dados de um novo item.
     *
     * @param  array  $data
     * @return Illuminate\Database\Eloquent\Model
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Retorna o primeiro item que conter os atributos ou grava um novo.
     *
     * @param  array  $attributes
     * @param  array  $values
     * @return \Illuminate\Database\Eloquent\Model|static
     */
    public function firstOrCreate(array $attributes, array $values = [])
    {
        return $this->model->firstOrCreate($attributes, $values);
    }

    /**
     * Altera os dados de um item.
     *
     * @param  array  $data
     * @param  int  $id
     * @return bool|null
     */
    public function update(array $data, int $id)
    {
        return $this->model->find($id)->update($data);
    }

    /**
     * Altera ou grava os dados de um elemento.
     *
     * @param  array  $attributes
     * @param  array  $values
     * @return bool|null
     */
    public function updateOrCreate(array $attributes, array $values = [])
    {
        return $this->model->updateOrCreate($attributes, $values);
    }
    
    /**
     * Remove os dados de um item.
     *
     * @param  int  $id
     * @return bool|null
     */
    public function delete(int $id)
    {
        return $this->model->find($id)->delete();
    }
    
    /**
     * Remove os dados dos itens que satisfaçam a busca.
     *
     * @param string $$attribute
     * @param string $value
     * @return bool|null
     */
    public function deleteBy($attribute, $value)
    {
        return $this->model->where($attribute, $value)->delete();
    }

    /**
     * Retorna todos os registros que satisfaçam a busca.
     *
     * @param string $attribute
     * @param $value
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function findBy($attribute, $value)
    {
        return $this->model->where($attribute, '=', $value)->get();
    }

    /**
     * Retorna o primeiro registro que satisfaça a busca.
     *
     * @param string $attribute
     * @param $value
     * @return Illuminate\Database\Eloquent\Model
     */
    public function findFirstBy($attribute, $value)
    {
        return $this->model->where($attribute, '=', $value)->first();
    }
}
