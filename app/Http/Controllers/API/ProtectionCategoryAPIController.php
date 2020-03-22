<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProtectionCategoryAPIRequest;
use App\Http\Requests\API\UpdateProtectionCategoryAPIRequest;
use App\Models\ProtectionCategory;
use App\Repositories\ProtectionCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ProtectionCategoryController
 * @package App\Http\Controllers\API
 */

class ProtectionCategoryAPIController extends AppBaseController
{
    /** @var  ProtectionCategoryRepository */
    private $protectionCategoryRepository;

    public function __construct(ProtectionCategoryRepository $protectionCategoryRepo)
    {
        $this->middleware('auth:api');
        $this->protectionCategoryRepository = $protectionCategoryRepo;
    }

    /**
     * Display a listing of the ProtectionCategory.
     * GET|HEAD /protectionCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $protectionCategories = $this->protectionCategoryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($protectionCategories->toArray(), 'Protection Categories retrieved successfully');
    }

    /**
     * Store a newly created ProtectionCategory in storage.
     * POST /protectionCategories
     *
     * @param CreateProtectionCategoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProtectionCategoryAPIRequest $request)
    {
        $input = $request->all();

        $protectionCategory = $this->protectionCategoryRepository->create($input);

        return $this->sendResponse($protectionCategory->toArray(), 'Protection Category saved successfully');
    }

    /**
     * Display the specified ProtectionCategory.
     * GET|HEAD /protectionCategories/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ProtectionCategory $protectionCategory */
        $protectionCategory = $this->protectionCategoryRepository->find($id);

        if (empty($protectionCategory)) {
            return $this->sendError('Protection Category not found');
        }

        return $this->sendResponse($protectionCategory->toArray(), 'Protection Category retrieved successfully');
    }

    /**
     * Update the specified ProtectionCategory in storage.
     * PUT/PATCH /protectionCategories/{id}
     *
     * @param int $id
     * @param UpdateProtectionCategoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProtectionCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var ProtectionCategory $protectionCategory */
        $protectionCategory = $this->protectionCategoryRepository->find($id);

        if (empty($protectionCategory)) {
            return $this->sendError('Protection Category not found');
        }

        $protectionCategory = $this->protectionCategoryRepository->update($input, $id);

        return $this->sendResponse($protectionCategory->toArray(), 'ProtectionCategory updated successfully');
    }

    /**
     * Remove the specified ProtectionCategory from storage.
     * DELETE /protectionCategories/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ProtectionCategory $protectionCategory */
        $protectionCategory = $this->protectionCategoryRepository->find($id);

        if (empty($protectionCategory)) {
            return $this->sendError('Protection Category not found');
        }

        $protectionCategory->delete();

        return $this->sendResponse($id, 'Protection Category deleted successfully');
    }
}
