<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePrefactorAPIRequest;
use App\Http\Requests\API\UpdatePrefactorAPIRequest;
use App\Models\Prefactor;
use App\Repositories\PrefactorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PrefactorController
 * @package App\Http\Controllers\API
 */

class PrefactorAPIController extends AppBaseController
{
    /** @var  PrefactorRepository */
    private $prefactorRepository;

    public function __construct(PrefactorRepository $prefactorRepo)
    {
        $this->prefactorRepository = $prefactorRepo;
    }

    /**
     * Display a listing of the Prefactor.
     * GET|HEAD /prefactors
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $prefactors = $this->prefactorRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($prefactors->toArray(), 'Prefactors retrieved successfully');
    }

    /**
     * Store a newly created Prefactor in storage.
     * POST /prefactors
     *
     * @param CreatePrefactorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePrefactorAPIRequest $request)
    {
        $input = $request->all();

        $prefactor = $this->prefactorRepository->create($input);

        return $this->sendResponse($prefactor->toArray(), 'Prefactor saved successfully');
    }

    /**
     * Display the specified Prefactor.
     * GET|HEAD /prefactors/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Prefactor $prefactor */
        $prefactor = $this->prefactorRepository->find($id);

        if (empty($prefactor)) {
            return $this->sendError('Prefactor not found');
        }

        return $this->sendResponse($prefactor->toArray(), 'Prefactor retrieved successfully');
    }

    /**
     * Update the specified Prefactor in storage.
     * PUT/PATCH /prefactors/{id}
     *
     * @param int $id
     * @param UpdatePrefactorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePrefactorAPIRequest $request)
    {
        $input = $request->all();

        /** @var Prefactor $prefactor */
        $prefactor = $this->prefactorRepository->find($id);

        if (empty($prefactor)) {
            return $this->sendError('Prefactor not found');
        }

        $prefactor = $this->prefactorRepository->update($input, $id);

        return $this->sendResponse($prefactor->toArray(), 'Prefactor updated successfully');
    }

    /**
     * Remove the specified Prefactor from storage.
     * DELETE /prefactors/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Prefactor $prefactor */
        $prefactor = $this->prefactorRepository->find($id);

        if (empty($prefactor)) {
            return $this->sendError('Prefactor not found');
        }

        $prefactor->delete();

        return $this->sendResponse($id, 'Prefactor deleted successfully');
    }
}
