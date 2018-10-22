<?php

namespace App\Repositories;

use App\Models\DetFactura;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DetFacturaRepository
 * @package App\Repositories
 * @version October 21, 2018, 5:54 pm -05
 *
 * @method DetFactura findWithoutFail($id, $columns = ['*'])
 * @method DetFactura find($id, $columns = ['*'])
 * @method DetFactura first($columns = ['*'])
*/
class DetFacturaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cab_factura_id',
        'producto_id',
        'cantidad',
        'descuento',
        'total'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DetFactura::class;
    }
}
