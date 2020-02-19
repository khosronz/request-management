<?php

namespace App\Repositories;

use App\Models\Card;
use App\Repositories\BaseRepository;

/**
 * Class CardRepository
 * @package App\Repositories
 * @version February 19, 2020, 9:11 pm +0330
*/

class CardRepository extends BaseRepository
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
        return Card::class;
    }
}
