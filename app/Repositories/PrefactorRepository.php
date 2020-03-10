<?php

namespace App\Repositories;

use App\Models\Prefactor;
use App\Repositories\BaseRepository;

/**
 * Class PrefactorRepository
 * @package App\Repositories
 * @version March 10, 2020, 6:21 pm +0330
*/

class PrefactorRepository extends BaseRepository
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
        return Prefactor::class;
    }
}
