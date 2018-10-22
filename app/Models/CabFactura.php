<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class CabFactura
 * @package App\Models
 * @version October 21, 2018, 5:51 pm -05
 *
 * @property \App\Models\Cliente cliente
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection DetFactura
 * @property string num_factura
 * @property integer cliente_id
 * @property decimal subtotal
 * @property decimal iva
 * @property decimal descuento
 * @property decimal total
 * @property integer usuario_id
 */
class CabFactura extends Model
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
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function cliente()
    {
        return $this->belongsTo(\App\Models\Cliente::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function detFacturas()
    {
        return $this->hasMany(\App\Models\DetFactura::class);
    }
}
