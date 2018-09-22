<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Usuario
 * @package App\Models
 * @version September 18, 2018, 7:51 pm -05
 *
 * @property string name
 * @property string username
 * @property string email
 * @property string password
 * @property string remember_token
 */
class Usuario extends Model
{

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'name',
        'username',
        'email',
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'username' => 'string',
        'email' => 'string',
        'password' => 'string',
        'remember_token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
