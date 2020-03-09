<?php

namespace App\Repositories;

use App\Models\OrganizationCategory;
use App\Repositories\BaseRepository;

/**
 * Class OrganizationCategoryRepository
 * @package App\Repositories
 * @version March 9, 2020, 4:55 pm +0330
*/

class OrganizationCategoryRepository extends BaseRepository
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
        return OrganizationCategory::class;
    }
}
