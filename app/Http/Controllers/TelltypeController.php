<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTelltypeRequest;
use App\Http\Requests\UpdateTelltypeRequest;
use App\Models\Telltype;
use App\Repositories\TelltypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class TelltypeController extends AppBaseController
{
    /** @var  TelltypeRepository */
    private $telltypeRepository;

    public function __construct(TelltypeRepository $telltypeRepo)
    {
        $this->telltypeRepository = $telltypeRepo;
    }

    /**
     * Display a listing of the Telltype.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->can('viewAny', Telltype::class)) {
            $telltypes = $this->telltypeRepository->paginate(10);

            return view('telltypes.index')
                ->with('telltypes', $telltypes);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Show the form for creating a new Telltype.
     *
     * @return Response
     */
    public function create()
    {
        if (Auth::user()->can('create', Telltype::class)) {
            return view('telltypes.create');
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Store a newly created Telltype in storage.
     *
     * @param CreateTelltypeRequest $request
     *
     * @return Response
     */
    public function store(CreateTelltypeRequest $request)
    {
        if(Auth::user()->can('create',Telltype::class)){
            $input = $request->all();

            $telltype = $this->telltypeRepository->create($input);

            Flash::success(__('Telltype') . ' ' . __('saved successfully.'));

            return redirect(route('telltypes.index'));
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Display the specified Telltype.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if(Auth::user()->can('view',Telltype::class)){
            $telltype = $this->telltypeRepository->find($id);

            if (empty($telltype)) {
                Flash::error(__('Telltype') . ' ' . __('not found.'));

                return redirect(route('telltypes.index'));
            }

            return view('telltypes.show')->with('telltype', $telltype);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Show the form for editing the specified Telltype.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {

        if(Auth::user()->can('update',Telltype::class)){
            $telltype = $this->telltypeRepository->find($id);

            if (empty($telltype)) {
                Flash::error(__('Telltype') . ' ' . __('not found.'));

                return redirect(route('telltypes.index'));
            }

            return view('telltypes.edit')->with('telltype', $telltype);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Update the specified Telltype in storage.
     *
     * @param int $id
     * @param UpdateTelltypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTelltypeRequest $request)
    {

        if(Auth::user()->can('update',Telltype::class)){
            $telltype = $this->telltypeRepository->find($id);

            if (empty($telltype)) {
                Flash::error(__('Telltype') . ' ' . __('not found.'));

                return redirect(route('telltypes.index'));
            }

            $telltype = $this->telltypeRepository->update($request->all(), $id);

            Flash::success(__('Telltype') . ' ' . __('updated successfully.'));

            return redirect(route('telltypes.index'));
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Remove the specified Telltype from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {

        if(Auth::user()->can('delete',Telltype::class)){
            $telltype = $this->telltypeRepository->find($id);

            if (empty($telltype)) {
                Flash::error(__('Telltype') . ' ' . __('not found.'));

                return redirect(route('telltypes.index'));
            }

            $this->telltypeRepository->delete($id);

            Flash::success(__('Telltype') . ' ' . __('deleted successfully.'));

            return redirect(route('telltypes.index'));
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }
}
