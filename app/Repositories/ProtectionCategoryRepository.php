<?php

namespace App\Repositories;

use App\Models\ProtectionCategory;
use App\Repositories\BaseRepository;

/**
 * Class ProtectionCategoryRepository
 * @package App\Repositories
 * @version March 5, 2020, 4:41 pm +0330
*/

class ProtectionCategoryRepository extends BaseRepository
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
        return ProtectionCategory::class;
    }
}
