<?php

namespace App\Http\Controllers;

use App\Enums\TicketStatus;
use App\Http\Requests\CreateTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\Ticket;
use App\Repositories\TicketRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Auth;
use Response;

class TicketController extends AppBaseController
{
    /** @var  TicketRepository */
    private $ticketRepository;

    public function __construct(TicketRepository $ticketRepo)
    {
        $this->ticketRepository = $ticketRepo;
    }

    /**
     * Display a listing of the Ticket.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $tickets = $this->ticketRepository->findByUserId(Auth::id())->paginate(5);

        return view('tickets.index')
            ->with('tickets', $tickets);
    }

    /**
     * Display a listing of the Ticket that you must answer to those.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function toanswer(Request $request)
    {
        $organizations = Auth::user()->organizations;
        $organization_ids=$organizations->pluck('id');

        $orgtickets = $this->ticketRepository->findByOrganizationId($organization_ids)->paginate(5);

        return view('tickets.toanswer-index')
            ->with('orgtickets', $orgtickets);
    }

    /**
     * Show the form for creating a new Ticket.
     *
     * @return Response
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created Ticket in storage.
     *
     * @param CreateTicketRequest $request
     *
     * @return Response
     */
    public function store(CreateTicketRequest $request)
    {
        $input = $request->all();

        $ticket = $this->ticketRepository->create($input);

        Flash::success(__('Ticket').' '.__('saved successfully.'));

        return redirect(route('tickets.index'));
    }

    /**
     * Display the specified Ticket.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $ticket = $this->ticketRepository->find($id);
        if(Auth::user()->can('view',$ticket)){

            if (empty($ticket)) {
                Flash::error(__('Ticket').' '.__('not found.'));

                return redirect(route('tickets.index'));
            }

            return view('tickets.show')->with('ticket', $ticket);
        }

        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Show the form for editing the specified Ticket.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $ticket = $this->ticketRepository->find($id);
        if(Auth::user()->can('update',$ticket)){

            if (empty($ticket)) {
                Flash::error(__('Ticket').' '.__('not found.'));

                return redirect(route('tickets.index'));
            }
            return view('tickets.edit')->with('ticket', $ticket);
        }
        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Update the specified Ticket in storage.
     *
     * @param int $id
     * @param UpdateTicketRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTicketRequest $request)
    {
        $ticket = $this->ticketRepository->find($id);
        if(Auth::user()->can('update',$ticket)){
            if (empty($ticket)) {
                Flash::error(__('Ticket').' '.__('not found.'));

                return redirect(route('tickets.index'));
            }

            $ticket = $this->ticketRepository->update($request->all(), $id);

            Flash::success(__('Ticket').' '.__('updated successfully.'));

            return redirect(route('tickets.index'));
        }

        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }

    /**
     * Remove the specified Ticket from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $ticket = $this->ticketRepository->find($id);
        if(Auth::user()->can('delete',$ticket)){

            if (empty($ticket)) {
                Flash::error(__('Ticket').' '.__('not found.'));

                return redirect(route('tickets.index'));
            }

            $ticket = $this->ticketRepository->update(['status'=>TicketStatus::close], $id);

//        $this->ticketRepository->delete($id);

            Flash::success(__('Ticket').' '.__('Closed successfully.'));

            return redirect(route('tickets.index'));
        }

        Flash::error(__('You do not permission to this section.'));
        return redirect(route('home'));
    }
}
