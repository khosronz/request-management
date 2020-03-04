<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laracasts\Flash\Flash;

class UserController extends Controller
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = $this->userRepository->paginate(5);

        return view('users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['password']=Hash::make($input['password']);

        $user = $this->userRepository->create($input);

        Flash::success(__('User').' '.__('saved successfully.'));

        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error(__('User').' '.__('not found.'));

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error(__('User').' '.__('not found.'));

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error(__('User').' '.__('not found.'));

            return redirect(route('users.index'));
        }
        $input = $request->all();
        if (!empty($input['password'])){
            $input['password']=Hash::make($input['password']);
        }

        $user = $this->userRepository->update($input, $id);

        Flash::success(__('User').' '.__('updated successfully.'));

        return redirect(route('users.index'));
    }

    public function updatePassword($id, Request $request)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error(__('User').' '.__('not found.'));

            return back();
        }
        $input = $request->all();
        if (!empty($input['password'])){
            $input['password']=Hash::make($input['password']);
        }

        $user = $this->userRepository->update($input, $id);

        Flash::success(__('User').' '.__('updated successfully.'));

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error(__('User').' '.__('not found.'));

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success(__('User').' '.__('deleted successfully.'));

        return redirect(route('users.index'));
    }
}
