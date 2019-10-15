<?php
namespace App\Contracts;

use App\Models\Store;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StoreInterface
 *
 * @author pavel
 */
interface StoreInterface {
    //put your code here
    public function find($id);
    public function findBy($where);
    public function findAll();
    public function save(Store $store);
    public function delete($id);
}
