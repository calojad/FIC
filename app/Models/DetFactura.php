<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class DetFactura
 * @package App\Models
 * @version October 21, 2018, 5:54 pm -05
 *
 * @property \App\Models\CabFactura cabFactura
 * @property \App\Models\Producto producto
 * @property \Illuminate\Database\Eloquent\Collection CabFactura
 * @property integer cab_factura_id
 * @property integer producto_id
 * @property integer cantidad
 * @property integer descuento
 * @property decimal total
 */
class DetFactura extends Model
{

    public $table = 'det_factura';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';



    public $fillable = [
        'cab_factura_id',
        'producto_id',
        'cantidad',
        'descuento',
        'total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'cab_factura_id' => 'integer',
        'producto_id' => 'integer',
        'cantidad' => 'integer',
        'descuento' => 'integer'
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
    public function cabFactura()
    {
        return $this->belongsTo(\App\Models\CabFactura::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function producto()
    {
        return $this->belongsTo(\App\Models\Producto::class);
    }
}
