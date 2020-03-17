<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrganizationCategoryRequest;
use App\Http\Requests\UpdateOrganizationCategoryRequest;
use App\Models\OrganizationCategory;
use App\Repositories\OrganizationCategoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
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
        if(Auth::user()->can('viewAny',OrganizationCategory::class)){
            $organizationCategories = $this->organizationCategoryRepository->paginate(10);

            return view('organization_categories.index')
                ->with('organizationCategories', $organizationCategories);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Show the form for creating a new OrganizationCategory.
     *
     * @return Response
     */
    public function create()
    {
        if(Auth::user()->can('create',OrganizationCategory::class)){
            return view('organization_categories.create');
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
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
        if(Auth::user()->can('create',OrganizationCategory::class)){
            $input = $request->all();

            $organizationCategory = $this->organizationCategoryRepository->create($input);

            Flash::success(__('Organization Category').' '.__('saved successfully.'));

            return redirect(route('organizationCategories.index'));
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
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
        if(Auth::user()->can('view',OrganizationCategory::class)){
            $organizationCategory = $this->organizationCategoryRepository->find($id);

            if (empty($organizationCategory)) {
                Flash::error(__('Organization Category').' '.__('not found.'));

                return redirect(route('organizationCategories.index'));
            }

            return view('organization_categories.show')->with('organizationCategory', $organizationCategory);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
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
        if(Auth::user()->can('update',OrganizationCategory::class)){
            $organizationCategory = $this->organizationCategoryRepository->find($id);

            if (empty($organizationCategory)) {
                Flash::error(__('Organization Category').' '.__('not found.'));

                return redirect(route('organizationCategories.index'));
            }

            return view('organization_categories.edit')->with('organizationCategory', $organizationCategory);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
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
        if(Auth::user()->can('update',OrganizationCategory::class)){
            $organizationCategory = $this->organizationCategoryRepository->find($id);

            if (empty($organizationCategory)) {
                Flash::error(__('Organization Category').' '.__('not found.'));

                return redirect(route('organizationCategories.index'));
            }

            $organizationCategory = $this->organizationCategoryRepository->update($request->all(), $id);

            Flash::success(__('Organization Category').' '.__('updated successfully.'));

            return redirect(route('organizationCategories.index'));
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
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
        if(Auth::user()->can('delete',OrganizationCategory::class)){
            $organizationCategory = $this->organizationCategoryRepository->find($id);

            if (empty($organizationCategory)) {
                Flash::error(__('Organization Category').' '.__('not found.'));

                return redirect(route('organizationCategories.index'));
            }

            $this->organizationCategoryRepository->delete($id);

            Flash::success(__('Organization Category').' '.__('deleted successfully.'));

            return redirect(route('organizationCategories.index'));
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }
}
