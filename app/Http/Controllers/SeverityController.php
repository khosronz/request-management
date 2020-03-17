<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSeverityRequest;
use App\Http\Requests\UpdateSeverityRequest;
use App\Models\Severity;
use App\Repositories\SeverityRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class SeverityController extends AppBaseController
{
    /** @var  SeverityRepository */
    private $severityRepository;

    public function __construct(SeverityRepository $severityRepo)
    {
        $this->severityRepository = $severityRepo;
    }

    /**
     * Display a listing of the Severity.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if(Auth::user()->can('viewAny',Severity::class)){
            $severities = $this->severityRepository->paginate(5);

            return view('severities.index')
                ->with('severities', $severities);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));

    }

    /**
     * Show the form for creating a new Severity.
     *
     * @return Response
     */
    public function create()
    {
        if(Auth::user()->can('create',Severity::class)){
            return view('severities.create');
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Store a newly created Severity in storage.
     *
     * @param CreateSeverityRequest $request
     *
     * @return Response
     */
    public function store(CreateSeverityRequest $request)
    {
        if(Auth::user()->can('create',Severity::class)){
            $input = $request->all();

            $severity = $this->severityRepository->create($input);

            Flash::success(__('Severity').' '.__('saved successfully.'));

            return redirect(route('severities.index'));
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Display the specified Severity.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        if(Auth::user()->can('view',Severity::class)){
            $severity = $this->severityRepository->find($id);

            if (empty($severity)) {
                Flash::error(__('Severity').' '.__('not found.'));

                return redirect(route('severities.index'));
            }

            return view('severities.show')->with('severity', $severity);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Show the form for editing the specified Severity.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        if(Auth::user()->can('update',Severity::class)){
            $severity = $this->severityRepository->find($id);

            if (empty($severity)) {
                Flash::error(__('Severity').' '.__('not found.'));

                return redirect(route('severities.index'));
            }

            return view('severities.edit')->with('severity', $severity);
        }

        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Update the specified Severity in storage.
     *
     * @param int $id
     * @param UpdateSeverityRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSeverityRequest $request)
    {

        if(Auth::user()->can('update',Severity::class)){
            $severity = $this->severityRepository->find($id);

            if (empty($severity)) {
                Flash::error(__('Severity').' '.__('not found.'));

                return redirect(route('severities.index'));
            }

            $severity = $this->severityRepository->update($request->all(), $id);

            Flash::success(__('Severity').' '.__('updated successfully.'));

            return redirect(route('severities.index'));
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Remove the specified Severity from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        if(Auth::user()->can('delete',Severity::class)){
            $severity = $this->severityRepository->find($id);

            if (empty($severity)) {
                Flash::error(__('Severity').' '.__('not found.'));

                return redirect(route('severities.index'));
            }

            $this->severityRepository->delete($id);

            Flash::success(__('Severity').' '.__('deleted successfully.'));

            return redirect(route('severities.index'));
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }
}
