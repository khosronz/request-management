<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFactoryRequest;
use App\Http\Requests\UpdateFactoryRequest;
use App\Models\Factory;
use App\Repositories\FactoryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
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
        if(Auth::user()->can('viewAny',Factory::class)){
            $factories = $this->factoryRepository->paginate(10);

            return view('factories.index')
                ->with('factories', $factories);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Show the form for creating a new Factory.
     *
     * @return Response
     */
    public function create()
    {
        if(Auth::user()->can('create',Factory::class)){
            return view('factories.create');
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
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
        if(Auth::user()->can('create',Factory::class)){

            $input = $request->all();

            $factory = $this->factoryRepository->create($input);

            Flash::success(__('Factory').' '.__('saved successfully.'));

            return redirect(route('factories.index'));

        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
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

        if(Auth::user()->can('view',Factory::class)){
            $factory = $this->factoryRepository->find($id);

            if (empty($factory)) {
                Flash::error(__('Factory').' '.__('not found.'));

                return redirect(route('factories.index'));
            }

            return view('factories.show')->with('factory', $factory);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
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
        if(Auth::user()->can('update',Factory::class)){
            $factory = $this->factoryRepository->find($id);

            if (empty($factory)) {
                Flash::error(__('Factory').' '.__('not found.'));

                return redirect(route('factories.index'));
            }

            return view('factories.edit')->with('factory', $factory);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
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

        if(Auth::user()->can('update',Factory::class)){
            $factory = $this->factoryRepository->find($id);

            if (empty($factory)) {
                Flash::error(__('Factory').' '.__('not found.'));

                return redirect(route('factories.index'));
            }

            $factory = $this->factoryRepository->update($request->all(), $id);

            Flash::success(__('Factory').' '.__('updated successfully.'));

            return redirect(route('factories.index'));
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
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
        if(Auth::user()->can('delete',Factory::class)){
            $factory = $this->factoryRepository->find($id);

            if (empty($factory)) {
                Flash::error(__('Factory').' '.__('not found.'));

                return redirect(route('factories.index'));
            }

            $this->factoryRepository->delete($id);

            Flash::success(__('Factory').' '.__('deleted successfully.'));

            return redirect(route('factories.index'));

        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }
}
