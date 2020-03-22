<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
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
        if (Auth::user()->can('viewAny', User::class)) {

            $users = $this->userRepository->paginate(5);

            return view('users.index')
                ->with('users', $users);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('create', User::class)) {
            return view('users.create');
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user()->can('create', User::class)) {
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            $input['api_token'] = hash('sha256', Str::random(80));

            $user = $this->userRepository->create($input);

            Flash::success(__('User') . ' ' . __('saved successfully.'));

            return redirect(route('users.index'));
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()->can('view', User::class)) {
            $user = $this->userRepository->find($id);

            if (empty($user)) {
                Flash::error(__('User') . ' ' . __('not found.'));

                return redirect(route('users.index'));
            }

            return view('users.show')->with('user', $user);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->can('update', User::class)) {
            $user = $this->userRepository->find($id);

            if (empty($user)) {
                Flash::error(__('User') . ' ' . __('not found.'));

                return redirect(route('users.index'));
            }

            return view('users.edit')->with('user', $user);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));

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

        if (Auth::user()->can('update', $user)) {

            if (empty($user)) {
                Flash::error(__('User') . ' ' . __('not found.'));

                return redirect(route('users.index'));
            }
            $input = $request->all();
            if (!empty($input['password']) || !empty($input['password_confirmation'])) {

                $input['password'] = Hash::make($input['password']);
            }

            if (empty($input['visible_to_everyone'])) {
                $input['visible_to_everyone'] = '0';
            }

            $user = $this->userRepository->update($input, $id);

            Flash::success(__('User') . ' ' . __('updated successfully.'));

            return back();
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    public function updatePassword($id, Request $request)
    {
        $user = $this->userRepository->find($id);

        if (Auth::user()->can('update', $user)) {

            if (empty($user)) {
                Flash::error(__('User') . ' ' . __('not found.'));

                return back();
            }

            $input = $request->all();
            if ($input['password'] == $input['password_confirmation']) {
                if (!empty($input['password'])) {
                    $input['password'] = Hash::make($input['password']);
                    $user = $this->userRepository->update($input, $id);
                    Flash::success(__('password updated successfully.'));
                    return back();
                } else {
                    Flash::error(__('password is empty'));
                    return back();
                }
            } else {
                Flash::error(__('User password and confirm not equals!'));
            }


//            $user = $this->userRepository->update($input, $id);
//
//            Flash::success(__('User') . ' ' . __('updated successfully.'));

            return back();
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->can('delete', User::class)) {
            $user = $this->userRepository->find($id);

            if (empty($user)) {
                Flash::error(__('User') . ' ' . __('not found.'));

                return redirect(route('users.index'));
            }

            $this->userRepository->delete($id);

            Flash::success(__('User') . ' ' . __('deleted successfully.'));

            return redirect(route('users.index'));
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }
}
