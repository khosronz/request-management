<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFactoryAPIRequest;
use App\Http\Requests\API\UpdateFactoryAPIRequest;
use App\Models\Factory;
use App\Repositories\FactoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FactoryController
 * @package App\Http\Controllers\API
 */

class FactoryAPIController extends AppBaseController
{
    /** @var  FactoryRepository */
    private $factoryRepository;

    public function __construct(FactoryRepository $factoryRepo)
    {
        $this->middleware('auth:api');
        $this->factoryRepository = $factoryRepo;
    }

    /**
     * Display a listing of the Factory.
     * GET|HEAD /factories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $factories = $this->factoryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($factories->toArray(), 'Factories retrieved successfully');
    }

    /**
     * Store a newly created Factory in storage.
     * POST /factories
     *
     * @param CreateFactoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFactoryAPIRequest $request)
    {
        $input = $request->all();

        $factory = $this->factoryRepository->create($input);

        return $this->sendResponse($factory->toArray(), 'Factory saved successfully');
    }

    /**
     * Display the specified Factory.
     * GET|HEAD /factories/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Factory $factory */
        $factory = $this->factoryRepository->find($id);

        if (empty($factory)) {
            return $this->sendError('Factory not found');
        }

        return $this->sendResponse($factory->toArray(), 'Factory retrieved successfully');
    }

    /**
     * Update the specified Factory in storage.
     * PUT/PATCH /factories/{id}
     *
     * @param int $id
     * @param UpdateFactoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFactoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var Factory $factory */
        $factory = $this->factoryRepository->find($id);

        if (empty($factory)) {
            return $this->sendError('Factory not found');
        }

        $factory = $this->factoryRepository->update($input, $id);

        return $this->sendResponse($factory->toArray(), 'Factory updated successfully');
    }

    /**
     * Remove the specified Factory from storage.
     * DELETE /factories/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Factory $factory */
        $factory = $this->factoryRepository->find($id);

        if (empty($factory)) {
            return $this->sendError('Factory not found');
        }

        $factory->delete();

        return $this->sendResponse($id, 'Factory deleted successfully');
    }
}
