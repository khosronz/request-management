<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePrefactorDetailAPIRequest;
use App\Http\Requests\API\UpdatePrefactorDetailAPIRequest;
use App\Models\PrefactorDetail;
use App\Repositories\PrefactorDetailRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PrefactorDetailController
 * @package App\Http\Controllers\API
 */

class PrefactorDetailAPIController extends AppBaseController
{
    /** @var  PrefactorDetailRepository */
    private $prefactorDetailRepository;

    public function __construct(PrefactorDetailRepository $prefactorDetailRepo)
    {
        $this->prefactorDetailRepository = $prefactorDetailRepo;
    }

    /**
     * Display a listing of the PrefactorDetail.
     * GET|HEAD /prefactorDetails
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $prefactorDetails = $this->prefactorDetailRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($prefactorDetails->toArray(), 'Prefactor Details retrieved successfully');
    }

    /**
     * Store a newly created PrefactorDetail in storage.
     * POST /prefactorDetails
     *
     * @param CreatePrefactorDetailAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePrefactorDetailAPIRequest $request)
    {
        $input = $request->all();

        $prefactorDetail = $this->prefactorDetailRepository->create($input);

        return $this->sendResponse($prefactorDetail->toArray(), 'Prefactor Detail saved successfully');
    }

    /**
     * Display the specified PrefactorDetail.
     * GET|HEAD /prefactorDetails/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var PrefactorDetail $prefactorDetail */
        $prefactorDetail = $this->prefactorDetailRepository->find($id);

        if (empty($prefactorDetail)) {
            return $this->sendError('Prefactor Detail not found');
        }

        return $this->sendResponse($prefactorDetail->toArray(), 'Prefactor Detail retrieved successfully');
    }

    /**
     * Update the specified PrefactorDetail in storage.
     * PUT/PATCH /prefactorDetails/{id}
     *
     * @param int $id
     * @param UpdatePrefactorDetailAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePrefactorDetailAPIRequest $request)
    {
        $input = $request->all();

        /** @var PrefactorDetail $prefactorDetail */
        $prefactorDetail = $this->prefactorDetailRepository->find($id);

        if (empty($prefactorDetail)) {
            return $this->sendError('Prefactor Detail not found');
        }

        $prefactorDetail = $this->prefactorDetailRepository->update($input, $id);

        return $this->sendResponse($prefactorDetail->toArray(), 'PrefactorDetail updated successfully');
    }

    /**
     * Remove the specified PrefactorDetail from storage.
     * DELETE /prefactorDetails/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var PrefactorDetail $prefactorDetail */
        $prefactorDetail = $this->prefactorDetailRepository->find($id);

        if (empty($prefactorDetail)) {
            return $this->sendError('Prefactor Detail not found');
        }

        $prefactorDetail->delete();

        return $this->sendResponse($id, 'Prefactor Detail deleted successfully');
    }
}
