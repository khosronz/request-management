<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEquipmentRequest;
use App\Http\Requests\UpdateEquipmentRequest;
use App\Models\Equipment;
use App\Repositories\EquipmentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class EquipmentController extends AppBaseController
{
    /** @var  EquipmentRepository */
    private $equipmentRepository;

    public function __construct(EquipmentRepository $equipmentRepo)
    {
        $this->equipmentRepository = $equipmentRepo;
    }

    /**
     * Display a listing of the Equipment.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->can('viewAny',Equipment::class)){
            $equipment = $this->equipmentRepository->paginate(10);

            return view('equipment.index')
                ->with('equipment', $equipment);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));

    }

    /**
     * Show the form for creating a new Equipment.
     *
     * @return Response
     */
    public function create()
    {
        if(Auth::user()->can('create',Equipment::class)){
            return view('equipment.create');
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Store a newly created Equipment in storage.
     *
     * @param CreateEquipmentRequest $request
     *
     * @return Response
     */
    public function store(CreateEquipmentRequest $request)
    {
        if(Auth::user()->can('create',Equipment::class)){
            $input = $request->all();

            $equipment = $this->equipmentRepository->create($input);

            Flash::success(__('Equipment').' '.__('saved successfully.'));

            return redirect(route('equipment.index'));
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Display the specified Equipment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if(Auth::user()->can('view',Equipment::class)){
            $equipment = $this->equipmentRepository->find($id);

            if (empty($equipment)) {
                Flash::error(__('Equipment').' '.__('not found.'));

                return redirect(route('equipment.index'));
            }

            return view('equipment.show')->with('equipment', $equipment);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));

    }

    /**
     * Show the form for editing the specified Equipment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        if(Auth::user()->can('update',Equipment::class)){
            $equipment = $this->equipmentRepository->find($id);

            if (empty($equipment)) {
                Flash::error(__('Equipment').' '.__('not found.'));

                return redirect(route('equipment.index'));
            }

            return view('equipment.edit')->with('equipment', $equipment);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Update the specified Equipment in storage.
     *
     * @param int $id
     * @param UpdateEquipmentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEquipmentRequest $request)
    {
        if(Auth::user()->can('update',Equipment::class)){
            $equipment = $this->equipmentRepository->find($id);

            if (empty($equipment)) {
                Flash::error(__('Equipment').' '.__('not found.'));

                return redirect(route('equipment.index'));
            }

            $equipment = $this->equipmentRepository->update($request->all(), $id);

            Flash::success(__('Equipment').' '.__('updated successfully.'));

            return redirect(route('equipment.index'));
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Remove the specified Equipment from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if(Auth::user()->can('delete',Equipment::class)){
            $equipment = $this->equipmentRepository->find($id);

            if (empty($equipment)) {
                Flash::error(__('Equipment').' '.__('not found.'));

                return redirect(route('equipment.index'));
            }

            $this->equipmentRepository->delete($id);

            Flash::success(__('Equipment').' '.__('deleted successfully.'));

            return redirect(route('equipment.index'));
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }
}
