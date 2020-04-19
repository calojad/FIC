<?php

namespace App\Repositories;

use App\Models\Factura;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FacturaRepository
 * @package App\Repositories
 * @version March 14, 2020, 6:00 pm -05
 *
 * @method Factura findWithoutFail($id, $columns = ['*'])
 * @method Factura find($id, $columns = ['*'])
 * @method Factura first($columns = ['*'])
*/
class FacturaRepository extends BaseRepository
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
        return Factura::class;
    }
}
