<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePrefactorRequest;
use App\Http\Requests\UpdatePrefactorRequest;
use App\Repositories\PrefactorRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PrefactorController extends AppBaseController
{
    /** @var  PrefactorRepository */
    private $prefactorRepository;

    public function __construct(PrefactorRepository $prefactorRepo)
    {
        $this->prefactorRepository = $prefactorRepo;
    }

    /**
     * Display a listing of the Prefactor.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $prefactors = $this->prefactorRepository->paginate(10);

        return view('prefactors.index')
            ->with('prefactors', $prefactors);
    }

    /**
     * Show the form for creating a new Prefactor.
     *
     * @return Response
     */
    public function create()
    {
        return view('prefactors.create');
    }

    /**
     * Store a newly created Prefactor in storage.
     *
     * @param CreatePrefactorRequest $request
     *
     * @return Response
     */
    public function store(CreatePrefactorRequest $request)
    {
        $input = $request->all();

        $prefactor = $this->prefactorRepository->create($input);

        Flash::success(__('Prefactor').' '.__('saved successfully.'));

        return redirect(route('prefactors.index'));
    }

    /**
     * Display the specified Prefactor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $prefactor = $this->prefactorRepository->find($id);

        if (empty($prefactor)) {
            Flash::error(__('Prefactor').' '.__('not found.'));

            return redirect(route('prefactors.index'));
        }

        return view('prefactors.show')->with('prefactor', $prefactor);
    }

    /**
     * Show the form for editing the specified Prefactor.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $prefactor = $this->prefactorRepository->find($id);

        if (empty($prefactor)) {
            Flash::error(__('Prefactor').' '.__('not found.'));

            return redirect(route('prefactors.index'));
        }

        return view('prefactors.edit')->with('prefactor', $prefactor);
    }

    /**
     * Update the specified Prefactor in storage.
     *
     * @param int $id
     * @param UpdatePrefactorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePrefactorRequest $request)
    {
        $prefactor = $this->prefactorRepository->find($id);

        if (empty($prefactor)) {
            Flash::error(__('Prefactor').' '.__('not found.'));

            return redirect(route('prefactors.index'));
        }

        $prefactor = $this->prefactorRepository->update($request->all(), $id);

        Flash::success(__('Prefactor').' '.__('updated successfully.'));

        return redirect(route('prefactors.index'));
    }

    /**
     * Remove the specified Prefactor from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $prefactor = $this->prefactorRepository->find($id);

        if (empty($prefactor)) {
            Flash::error(__('Prefactor').' '.__('not found.'));

            return redirect(route('prefactors.index'));
        }

        $this->prefactorRepository->delete($id);

        Flash::success(__('Prefactor').' '.__('deleted successfully.'));

        return redirect(route('prefactors.index'));
    }
}
