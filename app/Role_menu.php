<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class Role_menu extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

     /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $table ='tbl_role_menu';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id','id_role','id_menu','action_create','action_read','action_update','action_delete'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
