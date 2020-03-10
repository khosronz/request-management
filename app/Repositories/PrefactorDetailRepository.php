<?php

namespace App\Repositories;

use App\Models\PrefactorDetail;
use App\Repositories\BaseRepository;

/**
 * Class PrefactorDetailRepository
 * @package App\Repositories
 * @version March 10, 2020, 7:15 pm +0330
*/

class PrefactorDetailRepository extends BaseRepository
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
        return PrefactorDetail::class;
    }
}
