<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFactoryaddressAPIRequest;
use App\Http\Requests\API\UpdateFactoryaddressAPIRequest;
use App\Models\Factoryaddress;
use App\Repositories\FactoryaddressRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FactoryaddressController
 * @package App\Http\Controllers\API
 */

class FactoryaddressAPIController extends AppBaseController
{
    /** @var  FactoryaddressRepository */
    private $factoryaddressRepository;

    public function __construct(FactoryaddressRepository $factoryaddressRepo)
    {
        $this->factoryaddressRepository = $factoryaddressRepo;
    }

    /**
     * Display a listing of the Factoryaddress.
     * GET|HEAD /factoryaddresses
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $factoryaddresses = $this->factoryaddressRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($factoryaddresses->toArray(), 'Factoryaddresses retrieved successfully');
    }

    /**
     * Store a newly created Factoryaddress in storage.
     * POST /factoryaddresses
     *
     * @param CreateFactoryaddressAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFactoryaddressAPIRequest $request)
    {
        $input = $request->all();

        $factoryaddress = $this->factoryaddressRepository->create($input);

        return $this->sendResponse($factoryaddress->toArray(), 'Factoryaddress saved successfully');
    }

    /**
     * Display the specified Factoryaddress.
     * GET|HEAD /factoryaddresses/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Factoryaddress $factoryaddress */
        $factoryaddress = $this->factoryaddressRepository->find($id);

        if (empty($factoryaddress)) {
            return $this->sendError('Factoryaddress not found');
        }

        return $this->sendResponse($factoryaddress->toArray(), 'Factoryaddress retrieved successfully');
    }

    /**
     * Update the specified Factoryaddress in storage.
     * PUT/PATCH /factoryaddresses/{id}
     *
     * @param int $id
     * @param UpdateFactoryaddressAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFactoryaddressAPIRequest $request)
    {
        $input = $request->all();

        /** @var Factoryaddress $factoryaddress */
        $factoryaddress = $this->factoryaddressRepository->find($id);

        if (empty($factoryaddress)) {
            return $this->sendError('Factoryaddress not found');
        }

        $factoryaddress = $this->factoryaddressRepository->update($input, $id);

        return $this->sendResponse($factoryaddress->toArray(), 'Factoryaddress updated successfully');
    }

    /**
     * Remove the specified Factoryaddress from storage.
     * DELETE /factoryaddresses/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Factoryaddress $factoryaddress */
        $factoryaddress = $this->factoryaddressRepository->find($id);

        if (empty($factoryaddress)) {
            return $this->sendError('Factoryaddress not found');
        }

        $factoryaddress->delete();

        return $this->sendResponse($id, 'Factoryaddress deleted successfully');
    }
}
