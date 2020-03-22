<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEquipmentAPIRequest;
use App\Http\Requests\API\UpdateEquipmentAPIRequest;
use App\Models\Equipment;
use App\Repositories\CategoryRepository;
use App\Repositories\EquipmentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class EquipmentController
 * @package App\Http\Controllers\API
 */

class EquipmentAPIController extends AppBaseController
{
    /** @var  EquipmentRepository */
    private $equipmentRepository;
    private $categoryRepository;

    public function __construct(EquipmentRepository $equipmentRepo, CategoryRepository $categoryRepo)
    {
        $this->middleware('auth:api');
        $this->equipmentRepository = $equipmentRepo;
        $this->categoryRepository = $categoryRepo;
    }

    /**
     * Display a listing of the Equipment.
     * GET|HEAD /equipment
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $equipment = $this->equipmentRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($equipment->toArray(), 'Equipment retrieved successfully');
    }

    /**
     * Store a newly created Equipment in storage.
     * POST /equipment
     *
     * @param CreateEquipmentAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEquipmentAPIRequest $request)
    {
        $input = $request->all();

        $equipment = $this->equipmentRepository->create($input);

        return $this->sendResponse($equipment->toArray(), 'Equipment saved successfully');
    }

    /**
     * Display the specified Equipment.
     * GET|HEAD /equipment/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Equipment $equipment */
        $equipment = $this->equipmentRepository->find($id);

        if (empty($equipment)) {
            return $this->sendError('Equipment not found');
        }

        return $this->sendResponse($equipment->toArray(), 'Equipment retrieved successfully');
    }

    /**
     * Update the specified Equipment in storage.
     * PUT/PATCH /equipment/{id}
     *
     * @param int $id
     * @param UpdateEquipmentAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEquipmentAPIRequest $request)
    {
        $input = $request->all();

        /** @var Equipment $equipment */
        $equipment = $this->equipmentRepository->find($id);

        if (empty($equipment)) {
            return $this->sendError('Equipment not found');
        }

        $equipment = $this->equipmentRepository->update($input, $id);

        return $this->sendResponse($equipment->toArray(), 'Equipment updated successfully');
    }

    /**
     * Remove the specified Equipment from storage.
     * DELETE /equipment/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Equipment $equipment */
        $equipment = $this->equipmentRepository->find($id);

        if (empty($equipment)) {
            return $this->sendError('Equipment not found');
        }

        $equipment->delete();

        return $this->sendResponse($id, 'Equipment deleted successfully');
    }
}
