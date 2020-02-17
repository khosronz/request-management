<?php

namespace App\Repositories;

use App\Models\Telltype;
use App\Repositories\BaseRepository;

/**
 * Class TelltypeRepository
 * @package App\Repositories
 * @version February 17, 2020, 5:17 pm +0330
*/

class TelltypeRepository extends BaseRepository
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
        return Telltype::class;
    }
}
