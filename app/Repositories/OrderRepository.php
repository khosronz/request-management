<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * Class OrderRepository
 * @package App\Repositories
 * @version February 16, 2020, 12:43 pm +0330
 */
class OrderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'verified'
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
        return Order::class;
    }

    /**
     * Paginate records for scaffold.
     *
     * @param int $perPage
     * @param array $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($perPage, $columns = ['*'])
    {
        $query = $this->allQuery()->where('user_id', '=', Auth::id())->orderBy('created_at', 'desc');

        return $query->paginate($perPage, $columns);
    }

    /**
     * Retrieve all records with given filter criteria
     *
     * @param array $search
     * @param int|null $skip
     * @param int|null $limit
     * @param array $columns
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all($search = [], $skip = null, $limit = null, $columns = ['*'])
    {
        $query = $this->allQuery($search, $skip, $limit)->where('user_id', '=', Auth::id())->orderBy('created_at', 'desc');;

        return $query->get($columns);
    }

    public function ordersByProtectionCategoryEquipment()
    {
        $orders=Order::join('orderdetails', 'orderdetails.order_id', '=', 'orders.id')
            ->join('equipment', 'orderdetails.equipment_id', '=', 'equipment.id')
            ->join('categories', 'equipment.category_id', '=', 'categories.id')
            ->join('protection_categories', 'protection_categories.category_id', '=', 'categories.id')
            ->select('orders.*','categories.title as category_title');

        return $orders;
    }
}
