<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFactorytellAPIRequest;
use App\Http\Requests\API\UpdateFactorytellAPIRequest;
use App\Models\Factorytell;
use App\Repositories\FactorytellRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FactorytellController
 * @package App\Http\Controllers\API
 */

class FactorytellAPIController extends AppBaseController
{
    /** @var  FactorytellRepository */
    private $factorytellRepository;

    public function __construct(FactorytellRepository $factorytellRepo)
    {
        $this->factorytellRepository = $factorytellRepo;
    }

    /**
     * Display a listing of the Factorytell.
     * GET|HEAD /factorytells
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $factorytells = $this->factorytellRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($factorytells->toArray(), 'Factorytells retrieved successfully');
    }

    /**
     * Store a newly created Factorytell in storage.
     * POST /factorytells
     *
     * @param CreateFactorytellAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFactorytellAPIRequest $request)
    {
        $input = $request->all();

        $factorytell = $this->factorytellRepository->create($input);

        return $this->sendResponse($factorytell->toArray(), 'Factorytell saved successfully');
    }

    /**
     * Display the specified Factorytell.
     * GET|HEAD /factorytells/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Factorytell $factorytell */
        $factorytell = $this->factorytellRepository->find($id);

        if (empty($factorytell)) {
            return $this->sendError('Factorytell not found');
        }

        return $this->sendResponse($factorytell->toArray(), 'Factorytell retrieved successfully');
    }

    /**
     * Update the specified Factorytell in storage.
     * PUT/PATCH /factorytells/{id}
     *
     * @param int $id
     * @param UpdateFactorytellAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFactorytellAPIRequest $request)
    {
        $input = $request->all();

        /** @var Factorytell $factorytell */
        $factorytell = $this->factorytellRepository->find($id);

        if (empty($factorytell)) {
            return $this->sendError('Factorytell not found');
        }

        $factorytell = $this->factorytellRepository->update($input, $id);

        return $this->sendResponse($factorytell->toArray(), 'Factorytell updated successfully');
    }

    /**
     * Remove the specified Factorytell from storage.
     * DELETE /factorytells/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Factorytell $factorytell */
        $factorytell = $this->factorytellRepository->find($id);

        if (empty($factorytell)) {
            return $this->sendError('Factorytell not found');
        }

        $factorytell->delete();

        return $this->sendResponse($id, 'Factorytell deleted successfully');
    }
}
