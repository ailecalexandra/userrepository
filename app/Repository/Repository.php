<?php
namespace App\Http\Repository;



class Repository implements Service
{
    protected $model;


    public function __contruct(Model $model)
    {
        $this->model = $model;
    }

    public function getCollection()
    {
        return $this->model->all();
    }


    public function getModelInstance($id)
    {
        try {
            $instance = $this->model->findOrFail($id);

        }catch (ModelNotFoundException $exception) {
            $instance = null;
        }

        return $instance;
    }


    public function getInstanceWithoutFail($id){
        $instance = $this->model->find($id);
        if(!$instance) {
            return null;
        }

        return $instance;
    }


    public function storeInstance($data)
    {
        $instance = $this->model->create($data);
        $instance->save();

        return $instance;
    }


    public function updateInstance($id)
    {
        $instance = $this->getInstance($id);
        if ($instance)  {
            $instance->update($data);
        }


        return $instance;
    }



    public function deleteInstance($id)
    {
        $instance = $this->getInstance($id);
        if (!empty ($instance)){
            $instance->delete();
            return $instance;
        }else{
            return false;
        }


    }


    public function getWhereArray(array $wheres)
    {
        return $this->model->where($wheres)->get();

    }

    public function getFirstWhereArray($wheres)
    {
        return $this->model->where($wheres)->first();


    }


    public function getOneWhereClauseEqualFirst($where, $camp)
    {

        return $this->model->where($where, $camp)->first();
    }



    public function wrapQueryOnSelect($query)
    {
        return $this->model->select('*')->from($query)->withTrashed();
    }

    public function getDataRandom($take)
    {
        return $this->model->inRandomOrder()->take($take)->get();
    }





}