<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRoleUserAPIRequest;
use App\Http\Requests\API\UpdateRoleUserAPIRequest;
use App\Models\RoleUser;
use App\Repositories\RoleUserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class RoleUserController
 * @package App\Http\Controllers\API
 */

class RoleUserAPIController extends AppBaseController
{
    /** @var  RoleUserRepository */
    private $roleUserRepository;

    public function __construct(RoleUserRepository $roleUserRepo)
    {
        $this->middleware('auth:api');
        $this->roleUserRepository = $roleUserRepo;
    }

    /**
     * Display a listing of the RoleUser.
     * GET|HEAD /roleUsers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $roleUsers = $this->roleUserRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($roleUsers->toArray(), 'Role Users retrieved successfully');
    }

    /**
     * Store a newly created RoleUser in storage.
     * POST /roleUsers
     *
     * @param CreateRoleUserAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRoleUserAPIRequest $request)
    {
        $input = $request->all();

        $roleUser = $this->roleUserRepository->create($input);

        return $this->sendResponse($roleUser->toArray(), 'Role User saved successfully');
    }

    /**
     * Display the specified RoleUser.
     * GET|HEAD /roleUsers/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var RoleUser $roleUser */
        $roleUser = $this->roleUserRepository->find($id);

        if (empty($roleUser)) {
            return $this->sendError('Role User not found');
        }

        return $this->sendResponse($roleUser->toArray(), 'Role User retrieved successfully');
    }

    /**
     * Update the specified RoleUser in storage.
     * PUT/PATCH /roleUsers/{id}
     *
     * @param int $id
     * @param UpdateRoleUserAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoleUserAPIRequest $request)
    {
        $input = $request->all();

        /** @var RoleUser $roleUser */
        $roleUser = $this->roleUserRepository->find($id);

        if (empty($roleUser)) {
            return $this->sendError('Role User not found');
        }

        $roleUser = $this->roleUserRepository->update($input, $id);

        return $this->sendResponse($roleUser->toArray(), 'RoleUser updated successfully');
    }

    /**
     * Remove the specified RoleUser from storage.
     * DELETE /roleUsers/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var RoleUser $roleUser */
        $roleUser = $this->roleUserRepository->find($id);

        if (empty($roleUser)) {
            return $this->sendError('Role User not found');
        }

        $roleUser->delete();

        return $this->sendResponse($id, 'Role User deleted successfully');
    }
}
