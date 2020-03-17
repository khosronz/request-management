<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Role;
use App\Repositories\RoleRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class RoleController extends AppBaseController
{
    /** @var  RoleRepository */
    private $roleRepository;

    public function __construct(RoleRepository $roleRepo)
    {
        $this->roleRepository = $roleRepo;
    }

    /**
     * Display a listing of the Role.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->can('viewAny',Role::class)){
            $roles = $this->roleRepository->paginate(5);

            return view('roles.index')
                ->with('roles', $roles);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Show the form for creating a new Role.
     *
     * @return Response
     */
    public function create()
    {
        if(Auth::user()->can('create',Role::class)){
            return view('roles.create');
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param CreateRoleRequest $request
     *
     * @return Response
     */
    public function store(CreateRoleRequest $request)
    {

        if(Auth::user()->can('create',Role::class)){
            $input = $request->all();

            $role = $this->roleRepository->create($input);

            Flash::success(__('Role').' '.__('saved successfully.'));

            return redirect(route('roles.index'));
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Display the specified Role.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if(Auth::user()->can('view',Role::class)){
            $role = $this->roleRepository->find($id);

            if (empty($role)) {
                Flash::error(__('Role').' '.__('not found.'));

                return redirect(route('roles.index'));
            }

            return view('roles.show')->with('role', $role);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Show the form for editing the specified Role.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        if(Auth::user()->can('update',Role::class)){
            $role = $this->roleRepository->find($id);

            if (empty($role)) {
                Flash::error(__('Role').' '.__('not found.'));

                return redirect(route('roles.index'));
            }

            return view('roles.edit')->with('role', $role);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Update the specified Role in storage.
     *
     * @param int $id
     * @param UpdateRoleRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoleRequest $request)
    {
        if(Auth::user()->can('update',Role::class)){
            $role = $this->roleRepository->find($id);

            if (empty($role)) {
                Flash::error(__('Role').' '.__('not found.'));

                return redirect(route('roles.index'));
            }

            $role = $this->roleRepository->update($request->all(), $id);

            Flash::success(__('Role').' '.__('updated successfully.'));

            return redirect(route('roles.index'));
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Remove the specified Role from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if(Auth::user()->can('delete',Role::class)){
            $role = $this->roleRepository->find($id);

            if (empty($role)) {
                Flash::error(__('Role').' '.__('not found.'));

                return redirect(route('roles.index'));
            }

            $this->roleRepository->delete($id);

            Flash::success(__('Role').' '.__('deleted successfully.'));

            return redirect(route('roles.index'));
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }
}
