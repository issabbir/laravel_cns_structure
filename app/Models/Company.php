<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = "companies";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'nbr_regi_no', 'bin_no','contact_person', 'mobile', 'city','address','trade_license','old_bin','business_nature','activities_nature','activated_at','issued_at','description','e_tin'
    ];

    public function stores() {
       return $this->hasMany(Store::class, 'company_id');
     }
}
