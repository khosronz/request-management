<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOrganizationCategoryAPIRequest;
use App\Http\Requests\API\UpdateOrganizationCategoryAPIRequest;
use App\Models\OrganizationCategory;
use App\Repositories\OrganizationCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class OrganizationCategoryController
 * @package App\Http\Controllers\API
 */

class OrganizationCategoryAPIController extends AppBaseController
{
    /** @var  OrganizationCategoryRepository */
    private $organizationCategoryRepository;

    public function __construct(OrganizationCategoryRepository $organizationCategoryRepo)
    {
        $this->middleware('auth:api');
        $this->organizationCategoryRepository = $organizationCategoryRepo;
    }

    /**
     * Display a listing of the OrganizationCategory.
     * GET|HEAD /organizationCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $organizationCategories = $this->organizationCategoryRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($organizationCategories->toArray(), 'Organization Categories retrieved successfully');
    }

    /**
     * Store a newly created OrganizationCategory in storage.
     * POST /organizationCategories
     *
     * @param CreateOrganizationCategoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOrganizationCategoryAPIRequest $request)
    {
        $input = $request->all();

        $organizationCategory = $this->organizationCategoryRepository->create($input);

        return $this->sendResponse($organizationCategory->toArray(), 'Organization Category saved successfully');
    }

    /**
     * Display the specified OrganizationCategory.
     * GET|HEAD /organizationCategories/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var OrganizationCategory $organizationCategory */
        $organizationCategory = $this->organizationCategoryRepository->find($id);

        if (empty($organizationCategory)) {
            return $this->sendError('Organization Category not found');
        }

        return $this->sendResponse($organizationCategory->toArray(), 'Organization Category retrieved successfully');
    }

    /**
     * Update the specified OrganizationCategory in storage.
     * PUT/PATCH /organizationCategories/{id}
     *
     * @param int $id
     * @param UpdateOrganizationCategoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrganizationCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var OrganizationCategory $organizationCategory */
        $organizationCategory = $this->organizationCategoryRepository->find($id);

        if (empty($organizationCategory)) {
            return $this->sendError('Organization Category not found');
        }

        $organizationCategory = $this->organizationCategoryRepository->update($input, $id);

        return $this->sendResponse($organizationCategory->toArray(), 'OrganizationCategory updated successfully');
    }

    /**
     * Remove the specified OrganizationCategory from storage.
     * DELETE /organizationCategories/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var OrganizationCategory $organizationCategory */
        $organizationCategory = $this->organizationCategoryRepository->find($id);

        if (empty($organizationCategory)) {
            return $this->sendError('Organization Category not found');
        }

        $organizationCategory->delete();

        return $this->sendResponse($id, 'Organization Category deleted successfully');
    }
}
