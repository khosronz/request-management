<?php

namespace App\Repositories;

use App\Models\Factory;
use App\Repositories\BaseRepository;

/**
 * Class FactoryRepository
 * @package App\Repositories
 * @version February 17, 2020, 5:20 pm +0330
*/

class FactoryRepository extends BaseRepository
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
        return Factory::class;
    }
}
