<?php

namespace App\Repositories;

use App\Models\Equipment;
use App\Repositories\BaseRepository;

/**
 * Class EquipmentRepository
 * @package App\Repositories
 * @version February 16, 2020, 12:17 pm +0330
*/

class EquipmentRepository extends BaseRepository
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
        return Equipment::class;
    }
}
