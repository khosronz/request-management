<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;
use App\Models\Organization;
use App\Repositories\OrganizationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class OrganizationController extends AppBaseController
{
    /** @var  OrganizationRepository */
    private $organizationRepository;

    public function __construct(OrganizationRepository $organizationRepo)
    {
//        $this->authorizeResource(Organization::class,'organization');
//        $this->middleware('can:viewAny,organization');
        $this->organizationRepository = $organizationRepo;
    }

    /**
     * Display a listing of the Organization.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->can('viewAny',Organization::class)){
            $organizations = $this->organizationRepository->paginate(5);

            return view('organizations.index')
                ->with('organizations', $organizations);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Show the form for creating a new Organization.
     *
     * @return Response
     */
    public function create()
    {
        if(Auth::user()->can('create',Organization::class)){
            return view('organizations.create');
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Store a newly created Organization in storage.
     *
     * @param CreateOrganizationRequest $request
     *
     * @return Response
     */
    public function store(CreateOrganizationRequest $request)
    {
        if(Auth::user()->can('create',Organization::class)){

            $input = $request->all();

            $organization = $this->organizationRepository->create($input);

            Flash::success(__('Organization').' '.__('saved successfully.'));

            return redirect(route('organizations.index'));
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Display the specified Organization.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if(Auth::user()->can('view',Organization::class)){

            $organization = $this->organizationRepository->find($id);

            if (empty($organization)) {
                Flash::error(__('Organization not found'));

                return redirect(route('organizations.index'));
            }

            return view('organizations.show')->with('organization', $organization);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Show the form for editing the specified Organization.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        if(Auth::user()->can('update',Organization::class)){
            $organization = $this->organizationRepository->find($id);

            if (empty($organization)) {
                Flash::error(__('Organization not found'));

                return redirect(route('organizations.index'));
            }

            return view('organizations.edit')->with('organization', $organization);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Update the specified Organization in storage.
     *
     * @param int $id
     * @param UpdateOrganizationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrganizationRequest $request)
    {
        if(Auth::user()->can('update',Organization::class)){

            $organization = $this->organizationRepository->find($id);

            if (empty($organization)) {
                Flash::error('Organization not found');

                return redirect(route('organizations.index'));
            }

            $organization = $this->organizationRepository->update($request->all(), $id);

            Flash::success(__('Organization updated successfully.'));

            return redirect(route('organizations.index'));
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Remove the specified Organization from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if(Auth::user()->can('viewAny',Organization::class)){

            $organization = $this->organizationRepository->find($id);

            if (empty($organization)) {
                Flash::error(__('Organization not found'));

                return redirect(route('organizations.index'));
            }

            $this->organizationRepository->delete($id);

            Flash::success(__('Organization deleted successfully.'));

            return redirect(route('organizations.index'));
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }
}
