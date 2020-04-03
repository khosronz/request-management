<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
use App\Repositories\SettingRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class SettingController extends AppBaseController
{
    /** @var  SettingRepository */
    private $settingRepository;

    public function __construct(SettingRepository $settingRepo)
    {
        $this->settingRepository = $settingRepo;
    }

    /**
     * Display a listing of the Setting.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->can('viewAny', Setting::class)) {
            $settings = $this->settingRepository->paginate(10);

            return view('settings.index')
                ->with('settings', $settings);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));

    }

    /**
     * Show the form for creating a new Setting.
     *
     * @return Response
     */
    public function create()
    {
        if (Auth::user()->can('create', Setting::class)) {
            return view('settings.create');
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Store a newly created Setting in storage.
     *
     * @param CreateSettingRequest $request
     *
     * @return Response
     */
    public function store(CreateSettingRequest $request)
    {
        $input = $request->all();

        $setting = $this->settingRepository->create($input);

        if (Auth::user()->can('create', $setting)) {
            Flash::success(__('Setting') . ' ' . __('saved successfully.'));

            return redirect(route('settings.index'));
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Display the specified Setting.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $setting = $this->settingRepository->find($id);
        if (empty($setting)) {
            Flash::error(__('Setting') . ' ' . __('not found.'));

            return redirect(route('settings.index'));
        }
        if (Auth::user()->can('view', $setting)) {
            return view('settings.show')->with('setting', $setting);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Show the form for editing the specified Setting.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $setting = $this->settingRepository->find($id);

        if (empty($setting)) {
            Flash::error(__('Setting') . ' ' . __('not found.'));

            return redirect(route('settings.index'));
        }

        if(Auth::user()->can('update',$setting)){
            return view('settings.edit')->with('setting', $setting);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Update the specified Setting in storage.
     *
     * @param int $id
     * @param UpdateSettingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSettingRequest $request)
    {
        $setting = $this->settingRepository->find($id);

        if (empty($setting)) {
            Flash::error(__('Setting') . ' ' . __('not found.'));

            return redirect(route('settings.index'));
        }

        if(Auth::user()->can('update',$setting)){
            $setting = $this->settingRepository->update($request->all(), $id);

            Flash::success(__('Setting') . ' ' . __('updated successfully.'));

            return redirect(route('settings.index'));
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Remove the specified Setting from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $setting = $this->settingRepository->find($id);

        if (empty($setting)) {
            Flash::error(__('Setting') . ' ' . __('not found.'));

            return redirect(route('settings.index'));
        }

        if(Auth::user()->can('delete',$setting)){
            $this->settingRepository->delete($id);

            Flash::success(__('Setting') . ' ' . __('deleted successfully.'));

            return redirect(route('settings.index'));
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }
}
