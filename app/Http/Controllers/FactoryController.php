<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFactoryRequest;
use App\Http\Requests\UpdateFactoryRequest;
use App\Repositories\FactoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class FactoryController extends AppBaseController
{
    /** @var  FactoryRepository */
    private $factoryRepository;

    public function __construct(FactoryRepository $factoryRepo)
    {
        $this->factoryRepository = $factoryRepo;
    }

    /**
     * Display a listing of the Factory.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $factories = $this->factoryRepository->paginate(10);

        return view('factories.index')
            ->with('factories', $factories);
    }

    /**
     * Show the form for creating a new Factory.
     *
     * @return Response
     */
    public function create()
    {
        return view('factories.create');
    }

    /**
     * Store a newly created Factory in storage.
     *
     * @param CreateFactoryRequest $request
     *
     * @return Response
     */
    public function store(CreateFactoryRequest $request)
    {
        $input = $request->all();

        $factory = $this->factoryRepository->create($input);

        Flash::success(__('Factory').' '.__('saved successfully.'));

        return redirect(route('factories.index'));
    }

    /**
     * Display the specified Factory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $factory = $this->factoryRepository->find($id);

        if (empty($factory)) {
            Flash::error(__('Factory').' '.__('not found.'));

            return redirect(route('factories.index'));
        }

        return view('factories.show')->with('factory', $factory);
    }

    /**
     * Show the form for editing the specified Factory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $factory = $this->factoryRepository->find($id);

        if (empty($factory)) {
            Flash::error(__('Factory').' '.__('not found.'));

            return redirect(route('factories.index'));
        }

        return view('factories.edit')->with('factory', $factory);
    }

    /**
     * Update the specified Factory in storage.
     *
     * @param int $id
     * @param UpdateFactoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFactoryRequest $request)
    {
        $factory = $this->factoryRepository->find($id);

        if (empty($factory)) {
            Flash::error(__('Factory').' '.__('not found.'));

            return redirect(route('factories.index'));
        }

        $factory = $this->factoryRepository->update($request->all(), $id);

        Flash::success(__('Factory').' '.__('updated successfully.'));

        return redirect(route('factories.index'));
    }

    /**
     * Remove the specified Factory from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $factory = $this->factoryRepository->find($id);

        if (empty($factory)) {
            Flash::error(__('Factory').' '.__('not found.'));

            return redirect(route('factories.index'));
        }

        $this->factoryRepository->delete($id);

        Flash::success(__('Factory').' '.__('deleted successfully.'));

        return redirect(route('factories.index'));
    }
}
