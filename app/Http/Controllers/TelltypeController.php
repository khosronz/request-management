<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTelltypeRequest;
use App\Http\Requests\UpdateTelltypeRequest;
use App\Repositories\TelltypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
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
        $telltypes = $this->telltypeRepository->paginate(10);

        return view('telltypes.index')
            ->with('telltypes', $telltypes);
    }

    /**
     * Show the form for creating a new Telltype.
     *
     * @return Response
     */
    public function create()
    {
        return view('telltypes.create');
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
        $input = $request->all();

        $telltype = $this->telltypeRepository->create($input);

        Flash::success(__('Telltype').' '.__('saved successfully.'));

        return redirect(route('telltypes.index'));
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
        $telltype = $this->telltypeRepository->find($id);

        if (empty($telltype)) {
            Flash::error(__('Telltype').' '.__('not found.'));

            return redirect(route('telltypes.index'));
        }

        return view('telltypes.show')->with('telltype', $telltype);
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
        $telltype = $this->telltypeRepository->find($id);

        if (empty($telltype)) {
            Flash::error(__('Telltype').' '.__('not found.'));

            return redirect(route('telltypes.index'));
        }

        return view('telltypes.edit')->with('telltype', $telltype);
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
        $telltype = $this->telltypeRepository->find($id);

        if (empty($telltype)) {
            Flash::error(__('Telltype').' '.__('not found.'));

            return redirect(route('telltypes.index'));
        }

        $telltype = $this->telltypeRepository->update($request->all(), $id);

        Flash::success(__('Telltype').' '.__('updated successfully.'));

        return redirect(route('telltypes.index'));
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
        $telltype = $this->telltypeRepository->find($id);

        if (empty($telltype)) {
            Flash::error(__('Telltype').' '.__('not found.'));

            return redirect(route('telltypes.index'));
        }

        $this->telltypeRepository->delete($id);

        Flash::success(__('Telltype').' '.__('deleted successfully.'));

        return redirect(route('telltypes.index'));
    }
}
