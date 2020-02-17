<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFactoryaddressRequest;
use App\Http\Requests\UpdateFactoryaddressRequest;
use App\Repositories\FactoryaddressRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class FactoryaddressController extends AppBaseController
{
    /** @var  FactoryaddressRepository */
    private $factoryaddressRepository;

    public function __construct(FactoryaddressRepository $factoryaddressRepo)
    {
        $this->factoryaddressRepository = $factoryaddressRepo;
    }

    /**
     * Display a listing of the Factoryaddress.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $factoryaddresses = $this->factoryaddressRepository->paginate(10);

        return view('factoryaddresses.index')
            ->with('factoryaddresses', $factoryaddresses);
    }

    /**
     * Show the form for creating a new Factoryaddress.
     *
     * @return Response
     */
    public function create()
    {
        return view('factoryaddresses.create');
    }

    /**
     * Store a newly created Factoryaddress in storage.
     *
     * @param CreateFactoryaddressRequest $request
     *
     * @return Response
     */
    public function store(CreateFactoryaddressRequest $request)
    {
        $input = $request->all();

        $factoryaddress = $this->factoryaddressRepository->create($input);

        Flash::success(__('Factoryaddress').' '.__('saved successfully.'));

        return redirect(route('factoryaddresses.index'));
    }

    /**
     * Display the specified Factoryaddress.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $factoryaddress = $this->factoryaddressRepository->find($id);

        if (empty($factoryaddress)) {
            Flash::error(__('Factoryaddress').' '.__('not found.'));

            return redirect(route('factoryaddresses.index'));
        }

        return view('factoryaddresses.show')->with('factoryaddress', $factoryaddress);
    }

    /**
     * Show the form for editing the specified Factoryaddress.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $factoryaddress = $this->factoryaddressRepository->find($id);

        if (empty($factoryaddress)) {
            Flash::error(__('Factoryaddress').' '.__('not found.'));

            return redirect(route('factoryaddresses.index'));
        }

        return view('factoryaddresses.edit')->with('factoryaddress', $factoryaddress);
    }

    /**
     * Update the specified Factoryaddress in storage.
     *
     * @param int $id
     * @param UpdateFactoryaddressRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFactoryaddressRequest $request)
    {
        $factoryaddress = $this->factoryaddressRepository->find($id);

        if (empty($factoryaddress)) {
            Flash::error(__('Factoryaddress').' '.__('not found.'));

            return redirect(route('factoryaddresses.index'));
        }

        $factoryaddress = $this->factoryaddressRepository->update($request->all(), $id);

        Flash::success(__('Factoryaddress').' '.__('updated successfully.'));

        return redirect(route('factoryaddresses.index'));
    }

    /**
     * Remove the specified Factoryaddress from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $factoryaddress = $this->factoryaddressRepository->find($id);

        if (empty($factoryaddress)) {
            Flash::error(__('Factoryaddress').' '.__('not found.'));

            return redirect(route('factoryaddresses.index'));
        }

        $this->factoryaddressRepository->delete($id);

        Flash::success(__('Factoryaddress').' '.__('deleted successfully.'));

        return redirect(route('factoryaddresses.index'));
    }
}
