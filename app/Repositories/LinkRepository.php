<?php

namespace App\Repositories;

use App\Models\Link;
use App\Repositories\BaseRepository;

/**
 * Class LinkRepository
 * @package App\Repositories
 * @version March 31, 2020, 12:01 pm +0430
*/

class LinkRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'url',
        'expression'
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
        return Link::class;
    }
}
