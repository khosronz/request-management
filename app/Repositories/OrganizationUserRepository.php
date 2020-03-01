<?php

namespace App\Repositories;

use App\Models\OrganizationUser;
use App\Repositories\BaseRepository;

/**
 * Class OrganizationUserRepository
 * @package App\Repositories
 * @version March 1, 2020, 10:00 am +0330
*/

class OrganizationUserRepository extends BaseRepository
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
        return OrganizationUser::class;
    }

    public function forceDelete($id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);

        return $model->forceDelete();
    }
}
