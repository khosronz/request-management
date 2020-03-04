<?php

namespace App\Repositories;

use App\Models\RoleUser;
use App\Repositories\BaseRepository;

/**
 * Class RoleUserRepository
 * @package App\Repositories
 * @version March 4, 2020, 7:15 pm +0330
*/

class RoleUserRepository extends BaseRepository
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
        return RoleUser::class;
    }
}
