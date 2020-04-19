<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Factura
 * @package App\Models
 * @version March 14, 2020, 6:00 pm -05
 *
 * @property \App\Models\Cliente cliente
 * @property \App\Models\User usuario
 * @property \Illuminate\Database\Eloquent\Collection detFacturas
 * @property string num_factura
 * @property integer cliente_id
 * @property decimal subtotal
 * @property decimal iva
 * @property decimal descuento
 * @property decimal total
 * @property integer usuario_id
 */
class Factura extends Model
{

    public $table = 'cab_factura';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'num_factura',
        'cliente_id',
        'subtotal',
        'iva',
        'descuento',
        'total',
        'usuario_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'num_factura' => 'string',
        'cliente_id' => 'integer',
        'usuario_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id' => 'required',
        'num_factura' => 'required',
        'cliente_id' => 'required',
        'subtotal' => 'required',
        'iva' => 'required',
        'descuento' => 'required',
        'total' => 'required',
        'usuario_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cliente()
    {
        return $this->belongsTo(\App\Models\Cliente::class, 'cliente_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function usuario()
    {
        return $this->belongsTo(\App\User::class, 'usuario_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function detFacturas()
    {
        return $this->hasMany(\App\Models\DetFactura::class);
    }
}
