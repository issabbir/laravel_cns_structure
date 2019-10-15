<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = "stores";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'type', 'contact_person_name', 'contact_person_mobile', 'contact_person_email', 'owner_name', 'owner_mobile', 'owner_email', 'company_id','designation'
    ];

    function company (){
        return $this->belongsTo(Company::class);
    }
}
