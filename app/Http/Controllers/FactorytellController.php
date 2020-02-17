<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFactorytellRequest;
use App\Http\Requests\UpdateFactorytellRequest;
use App\Repositories\FactorytellRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class FactorytellController extends AppBaseController
{
    /** @var  FactorytellRepository */
    private $factorytellRepository;

    public function __construct(FactorytellRepository $factorytellRepo)
    {
        $this->factorytellRepository = $factorytellRepo;
    }

    /**
     * Display a listing of the Factorytell.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $factorytells = $this->factorytellRepository->paginate(10);

        return view('factorytells.index')
            ->with('factorytells', $factorytells);
    }

    /**
     * Show the form for creating a new Factorytell.
     *
     * @return Response
     */
    public function create()
    {
        return view('factorytells.create');
    }

    /**
     * Store a newly created Factorytell in storage.
     *
     * @param CreateFactorytellRequest $request
     *
     * @return Response
     */
    public function store(CreateFactorytellRequest $request)
    {
        $input = $request->all();

        $factorytell = $this->factorytellRepository->create($input);

        Flash::success(__('Factorytell').' '.__('saved successfully.'));

        return redirect(route('factorytells.index'));
    }

    /**
     * Display the specified Factorytell.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $factorytell = $this->factorytellRepository->find($id);

        if (empty($factorytell)) {
            Flash::error(__('Factorytell').' '.__('not found.'));

            return redirect(route('factorytells.index'));
        }

        return view('factorytells.show')->with('factorytell', $factorytell);
    }

    /**
     * Show the form for editing the specified Factorytell.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $factorytell = $this->factorytellRepository->find($id);

        if (empty($factorytell)) {
            Flash::error(__('Factorytell').' '.__('not found.'));

            return redirect(route('factorytells.index'));
        }

        return view('factorytells.edit')->with('factorytell', $factorytell);
    }

    /**
     * Update the specified Factorytell in storage.
     *
     * @param int $id
     * @param UpdateFactorytellRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFactorytellRequest $request)
    {
        $factorytell = $this->factorytellRepository->find($id);

        if (empty($factorytell)) {
            Flash::error(__('Factorytell').' '.__('not found.'));

            return redirect(route('factorytells.index'));
        }

        $factorytell = $this->factorytellRepository->update($request->all(), $id);

        Flash::success(__('Factorytell').' '.__('updated successfully.'));

        return redirect(route('factorytells.index'));
    }

    /**
     * Remove the specified Factorytell from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $factorytell = $this->factorytellRepository->find($id);

        if (empty($factorytell)) {
            Flash::error(__('Factorytell').' '.__('not found.'));

            return redirect(route('factorytells.index'));
        }

        $this->factorytellRepository->delete($id);

        Flash::success(__('Factorytell').' '.__('deleted successfully.'));

        return redirect(route('factorytells.index'));
    }
}
