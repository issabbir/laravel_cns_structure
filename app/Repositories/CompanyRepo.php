<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;

use App\Models\Company;
use App\Contracts\CompanyInterface;
use Illuminate\Contracts\Auth\Guard;
use Mockery\CountValidator\Exception;

/**
 * Description of CompanyRepo
 *
 * @author Pavel
 */
class CompanyRepo implements CompanyInterface {

    private $companyEloquent;
    private $auth;

    /**
     * @param Company $company
     * @param Guard $auth
     */
    public function __construct(Company $company, Guard $auth) {
        $this->companyEloquent = $company;
        $this->auth = $auth;
    }

    /**
     * @param integer $id
     * @return Company;
     */
    public function find($id) {
        try {
            return $this->companyEloquent->findOrFail($id);
        }
        catch (\Exception $e) {
            return "no result found";
        }
    }


    public function findBy($where) {
    }

    public function findAll() {
        return $this->companyEloquent->all();
    }

    /**
     * @param Company $company
     * @return Company|boolean
     */
    public function save(Company $company) {
        //$company->user_id = $this->auth->user()->id;
        //$company->is_active = 1;
        if ($company->save())
            return $company;

        return false;
    }

    public function delete($id)
    {
        $entity = $this->find($id);
        if($entity)
            $entity->delete();
    }
}
