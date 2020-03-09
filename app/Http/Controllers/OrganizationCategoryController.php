<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrganizationCategoryRequest;
use App\Http\Requests\UpdateOrganizationCategoryRequest;
use App\Repositories\OrganizationCategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class OrganizationCategoryController extends AppBaseController
{
    /** @var  OrganizationCategoryRepository */
    private $organizationCategoryRepository;

    public function __construct(OrganizationCategoryRepository $organizationCategoryRepo)
    {
        $this->organizationCategoryRepository = $organizationCategoryRepo;
    }

    /**
     * Display a listing of the OrganizationCategory.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $organizationCategories = $this->organizationCategoryRepository->paginate(10);

        return view('organization_categories.index')
            ->with('organizationCategories', $organizationCategories);
    }

    /**
     * Show the form for creating a new OrganizationCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('organization_categories.create');
    }

    /**
     * Store a newly created OrganizationCategory in storage.
     *
     * @param CreateOrganizationCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateOrganizationCategoryRequest $request)
    {
        $input = $request->all();

        $organizationCategory = $this->organizationCategoryRepository->create($input);

        Flash::success(__('Organization Category').' '.__('saved successfully.'));

        return redirect(route('organizationCategories.index'));
    }

    /**
     * Display the specified OrganizationCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $organizationCategory = $this->organizationCategoryRepository->find($id);

        if (empty($organizationCategory)) {
            Flash::error(__('Organization Category').' '.__('not found.'));

            return redirect(route('organizationCategories.index'));
        }

        return view('organization_categories.show')->with('organizationCategory', $organizationCategory);
    }

    /**
     * Show the form for editing the specified OrganizationCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $organizationCategory = $this->organizationCategoryRepository->find($id);

        if (empty($organizationCategory)) {
            Flash::error(__('Organization Category').' '.__('not found.'));

            return redirect(route('organizationCategories.index'));
        }

        return view('organization_categories.edit')->with('organizationCategory', $organizationCategory);
    }

    /**
     * Update the specified OrganizationCategory in storage.
     *
     * @param int $id
     * @param UpdateOrganizationCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrganizationCategoryRequest $request)
    {
        $organizationCategory = $this->organizationCategoryRepository->find($id);

        if (empty($organizationCategory)) {
            Flash::error(__('Organization Category').' '.__('not found.'));

            return redirect(route('organizationCategories.index'));
        }

        $organizationCategory = $this->organizationCategoryRepository->update($request->all(), $id);

        Flash::success(__('Organization Category').' '.__('updated successfully.'));

        return redirect(route('organizationCategories.index'));
    }

    /**
     * Remove the specified OrganizationCategory from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $organizationCategory = $this->organizationCategoryRepository->find($id);

        if (empty($organizationCategory)) {
            Flash::error(__('Organization Category').' '.__('not found.'));

            return redirect(route('organizationCategories.index'));
        }

        $this->organizationCategoryRepository->delete($id);

        Flash::success(__('Organization Category').' '.__('deleted successfully.'));

        return redirect(route('organizationCategories.index'));
    }
}
