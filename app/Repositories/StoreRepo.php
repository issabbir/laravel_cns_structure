<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;

use App\Models\Store;
use App\Contracts\StoreInterface;
use Illuminate\Contracts\Auth\Guard;
use Mockery\CountValidator\Exception;

/**
 * Description of StoreRepo
 *
 * @author Pavel
 */
class StoreRepo implements StoreInterface {

    private $storeEloquent;
    private $auth;

    /**
     * @param Store $store
     * @param Guard $auth
     */
    public function __construct(Store $store, Guard $auth) {
        $this->storeEloquent = $store;
        $this->auth = $auth;
    }

    /**
     * @param integer $id
     * @return Store;
     */
    public function find($id) {
        try {
            return $this->storeEloquent->findOrFail($id);
        }
        catch (\Exception $e) {
            return "no result found";
        }
    }


    public function findBy($where) {
    }

    public function findAll() {
        return $this->storeEloquent->all();
    }

    /**
     * @param Store $store
     * @return Store|boolean
     */
    public function save(Store $store) {
        //$Store->user_id = $this->auth->user()->id;
        //$Store->is_active = 1;
        if ($store->save())
            return $store;

        return false;
    }

    public function delete($id)
    {
        $entity = $this->find($id);
        if($entity)
            $entity->delete();
    }
}
