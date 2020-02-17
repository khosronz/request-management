<?php

namespace App\Repositories;

use App\Models\Factoryaddress;
use App\Repositories\BaseRepository;

/**
 * Class FactoryaddressRepository
 * @package App\Repositories
 * @version February 17, 2020, 5:19 pm +0330
*/

class FactoryaddressRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return Factoryaddress::class;
    }
}
