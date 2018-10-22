<?php

namespace App\Repositories;

use App\Models\CabFactura;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CabFacturaRepository
 * @package App\Repositories
 * @version October 21, 2018, 5:51 pm -05
 *
 * @method CabFactura findWithoutFail($id, $columns = ['*'])
 * @method CabFactura find($id, $columns = ['*'])
 * @method CabFactura first($columns = ['*'])
*/
class CabFacturaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'num_factura',
        'cliente_id',
        'subtotal',
        'iva',
        'descuento',
        'total',
        'usuario_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CabFactura::class;
    }
}
