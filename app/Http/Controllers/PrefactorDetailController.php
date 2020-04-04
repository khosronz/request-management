<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePrefactorDetailRequest;
use App\Http\Requests\UpdatePrefactorDetailRequest;
use App\Repositories\PrefactorDetailRepository;
use App\Http\Controllers\AppBaseController;
use foo\bar;
use Illuminate\Http\Request;
use Flash;
use Response;

class PrefactorDetailController extends AppBaseController
{
    /** @var  PrefactorDetailRepository */
    private $prefactorDetailRepository;

    public function __construct(PrefactorDetailRepository $prefactorDetailRepo)
    {
        $this->prefactorDetailRepository = $prefactorDetailRepo;
    }

    /**
     * Display a listing of the PrefactorDetail.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $prefactorDetails = $this->prefactorDetailRepository->paginate(10);

        return view('prefactor_details.index')
            ->with('prefactorDetails', $prefactorDetails);
    }

    /**
     * Show the form for creating a new PrefactorDetail.
     *
     * @return Response
     */
    public function create()
    {
        return view('prefactor_details.create');
    }

    /**
     * Store a newly created PrefactorDetail in storage.
     *
     * @param CreatePrefactorDetailRequest $request
     *
     * @return Response
     */
    public function store(CreatePrefactorDetailRequest $request)
    {
        $input = $request->all();

        $prefactorDetail = $this->prefactorDetailRepository->create($input);

        Flash::success(__('Prefactor Detail').' '.__('saved successfully.'));

        return redirect(route('prefactorDetails.index'));
    }

    /**
     * Display the specified PrefactorDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $prefactorDetail = $this->prefactorDetailRepository->find($id);

        if (empty($prefactorDetail)) {
            Flash::error(__('Prefactor Detail').' '.__('not found.'));

            return redirect(route('prefactorDetails.index'));
        }

        return view('prefactor_details.show')->with('prefactorDetail', $prefactorDetail);
    }

    /**
     * Show the form for editing the specified PrefactorDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $prefactorDetail = $this->prefactorDetailRepository->find($id);

        if (empty($prefactorDetail)) {
            Flash::error(__('Prefactor Detail').' '.__('not found.'));

            return redirect(route('prefactorDetails.index'));
        }

        return view('prefactor_details.edit')->with('prefactorDetail', $prefactorDetail);
    }

    /**
     * Update the specified PrefactorDetail in storage.
     *
     * @param int $id
     * @param UpdatePrefactorDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePrefactorDetailRequest $request)
    {
        $prefactorDetail = $this->prefactorDetailRepository->find($id);

        if (empty($prefactorDetail)) {
            Flash::error(__('Prefactor Detail').' '.__('not found.'));

            return redirect(route('prefactorDetails.index'));
        }

        $prefactorDetail = $this->prefactorDetailRepository->update($request->all(), $id);

        Flash::success(__('Prefactor Detail').' '.__('updated successfully.'));

        return back();
//        return redirect(route('prefactorDetails.index'));
    }

    /**
     * Remove the specified PrefactorDetail from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $prefactorDetail = $this->prefactorDetailRepository->find($id);

        if (empty($prefactorDetail)) {
            Flash::error(__('Prefactor Detail').' '.__('not found.'));

            return redirect(route('prefactorDetails.index'));
        }

        $this->prefactorDetailRepository->delete($id);

        Flash::success(__('Prefactor Detail').' '.__('deleted successfully.'));

        return redirect(route('prefactorDetails.index'));
    }
}
