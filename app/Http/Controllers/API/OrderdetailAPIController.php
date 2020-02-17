<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOrderdetailAPIRequest;
use App\Http\Requests\API\UpdateOrderdetailAPIRequest;
use App\Models\Orderdetail;
use App\Repositories\OrderdetailRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class OrderdetailController
 * @package App\Http\Controllers\API
 */

class OrderdetailAPIController extends AppBaseController
{
    /** @var  OrderdetailRepository */
    private $orderdetailRepository;

    public function __construct(OrderdetailRepository $orderdetailRepo)
    {
        $this->orderdetailRepository = $orderdetailRepo;
    }

    /**
     * Display a listing of the Orderdetail.
     * GET|HEAD /orderdetails
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $orderdetails = $this->orderdetailRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($orderdetails->toArray(), 'Orderdetails retrieved successfully');
    }

    /**
     * Store a newly created Orderdetail in storage.
     * POST /orderdetails
     *
     * @param CreateOrderdetailAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOrderdetailAPIRequest $request)
    {
        $input = $request->all();

        $orderdetail = $this->orderdetailRepository->create($input);

        return $this->sendResponse($orderdetail->toArray(), 'Orderdetail saved successfully');
    }

    /**
     * Display the specified Orderdetail.
     * GET|HEAD /orderdetails/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Orderdetail $orderdetail */
        $orderdetail = $this->orderdetailRepository->find($id);

        if (empty($orderdetail)) {
            return $this->sendError('Orderdetail not found');
        }

        return $this->sendResponse($orderdetail->toArray(), 'Orderdetail retrieved successfully');
    }

    /**
     * Update the specified Orderdetail in storage.
     * PUT/PATCH /orderdetails/{id}
     *
     * @param int $id
     * @param UpdateOrderdetailAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrderdetailAPIRequest $request)
    {
        $input = $request->all();

        /** @var Orderdetail $orderdetail */
        $orderdetail = $this->orderdetailRepository->find($id);

        if (empty($orderdetail)) {
            return $this->sendError('Orderdetail not found');
        }

        $orderdetail = $this->orderdetailRepository->update($input, $id);

        return $this->sendResponse($orderdetail->toArray(), 'Orderdetail updated successfully');
    }

    /**
     * Remove the specified Orderdetail from storage.
     * DELETE /orderdetails/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Orderdetail $orderdetail */
        $orderdetail = $this->orderdetailRepository->find($id);

        if (empty($orderdetail)) {
            return $this->sendError('Orderdetail not found');
        }

        $orderdetail->delete();

        return $this->sendResponse($id, 'Orderdetail deleted successfully');
    }
}
