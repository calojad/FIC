<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Cliente
 * @package App\Models
 * @version September 13, 2018, 8:04 pm -05
 *
 * @property string cedula
 * @property string razon_social
 * @property string nombres
 * @property string apellidos
 * @property string telefono
 * @property string email
 * @property string direccion
 */
class Cliente extends Model
{

    public $table = 'cliente';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'cedula',
        'razon_social',
        'nombres',
        'apellidos',
        'telefono',
        'email',
        'direccion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cedula' => 'string',
        'razon_social' => 'string',
        'nombres' => 'string',
        'apellidos' => 'string',
        'telefono' => 'string',
        'email' => 'string',
        'direccion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
