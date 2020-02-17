<?php

namespace App\Repositories;

use App\Models\Orderdetail;
use App\Repositories\BaseRepository;

/**
 * Class OrderdetailRepository
 * @package App\Repositories
 * @version February 17, 2020, 9:10 pm +0330
*/

class OrderdetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'status',
        'unit_price'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Orderdetail::class;
    }
}
