<?php

namespace App\Repositories;

use App\Models\Factorytell;
use App\Repositories\BaseRepository;

/**
 * Class FactorytellRepository
 * @package App\Repositories
 * @version February 17, 2020, 5:18 pm +0330
*/

class FactorytellRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title'
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
        return Factorytell::class;
    }
}
