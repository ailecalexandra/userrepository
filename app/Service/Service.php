<?php

namespace App\Http\Service;

interface Service
{
    // get collection all
    public function getCollection();
    // get model instance from repository
    public function getModelInstance();
    // get instance by id
    public function getInstance($id);
    // get instance by id if fail return null
    public function getInstanceWithoutFail($id);
    // store instance
    public function storeInstance($id);
    // update instance data is array
    public function updateInstance($id, array $data);
    // delete instance
    public function deleteInstance($id);
    // get results by wheres in array
    public function getWhereArray(array $wheres);
    // get results first by wheres in array
    public function getFirstWhereArray($wheres);
    // get own where clause equals first
    public function getOneWhereClauseEqualFirst($where, $camp);
    // select * from with filter withtrashed
    public function wrapQueryOnSelect($query);
    //get random item from collection model
    public function getDataRandom($take);

}