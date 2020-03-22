<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTelltypeAPIRequest;
use App\Http\Requests\API\UpdateTelltypeAPIRequest;
use App\Models\Telltype;
use App\Repositories\TelltypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class TelltypeController
 * @package App\Http\Controllers\API
 */

class TelltypeAPIController extends AppBaseController
{
    /** @var  TelltypeRepository */
    private $telltypeRepository;

    public function __construct(TelltypeRepository $telltypeRepo)
    {
        $this->middleware('auth:api');
        $this->telltypeRepository = $telltypeRepo;
    }

    /**
     * Display a listing of the Telltype.
     * GET|HEAD /telltypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $telltypes = $this->telltypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($telltypes->toArray(), 'Telltypes retrieved successfully');
    }

    /**
     * Store a newly created Telltype in storage.
     * POST /telltypes
     *
     * @param CreateTelltypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTelltypeAPIRequest $request)
    {
        $input = $request->all();

        $telltype = $this->telltypeRepository->create($input);

        return $this->sendResponse($telltype->toArray(), 'Telltype saved successfully');
    }

    /**
     * Display the specified Telltype.
     * GET|HEAD /telltypes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Telltype $telltype */
        $telltype = $this->telltypeRepository->find($id);

        if (empty($telltype)) {
            return $this->sendError('Telltype not found');
        }

        return $this->sendResponse($telltype->toArray(), 'Telltype retrieved successfully');
    }

    /**
     * Update the specified Telltype in storage.
     * PUT/PATCH /telltypes/{id}
     *
     * @param int $id
     * @param UpdateTelltypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTelltypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var Telltype $telltype */
        $telltype = $this->telltypeRepository->find($id);

        if (empty($telltype)) {
            return $this->sendError('Telltype not found');
        }

        $telltype = $this->telltypeRepository->update($input, $id);

        return $this->sendResponse($telltype->toArray(), 'Telltype updated successfully');
    }

    /**
     * Remove the specified Telltype from storage.
     * DELETE /telltypes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Telltype $telltype */
        $telltype = $this->telltypeRepository->find($id);

        if (empty($telltype)) {
            return $this->sendError('Telltype not found');
        }

        $telltype->delete();

        return $this->sendResponse($id, 'Telltype deleted successfully');
    }
}
