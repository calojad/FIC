<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Producto
 * @package App\Models
 * @version September 18, 2018, 6:10 pm -05
 *
 * @property string codigo
 * @property string nombre
 * @property decimal costo
 * @property decimal precio
 * @property integer stock
 */
class Producto extends Model
{

    public $table = 'producto';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'codigo',
        'nombre',
        'costo',
        'precio',
        'stock'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'codigo' => 'string',
        'nombre' => 'string',
        'stock' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
