<?php

namespace App\Models;

//use App\User;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{

        //use SoftDeletes;

   protected $table = "user_groups";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'group_name', 'role', 'store_id','is_active','group_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
         ''
    ];

   public function users() {
      return $this->belongsToMany(User::class, 'user_user_groups', 'group_id', 'user_id');
    }
}
