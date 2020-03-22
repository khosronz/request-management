<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCardAPIRequest;
use App\Http\Requests\API\UpdateCardAPIRequest;
use App\Models\Card;
use App\Repositories\CardRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CardController
 * @package App\Http\Controllers\API
 */
class CardAPIController extends AppBaseController
{
    /** @var  CardRepository */
    private $cardRepository;

    public function __construct(CardRepository $cardRepo)
    {
        $this->middleware('auth:api');
        $this->cardRepository = $cardRepo;
    }

    /**
     * Display a listing of the Card.
     * GET|HEAD /cards
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $cards = $this->cardRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($cards->toArray(), 'Cards retrieved successfully');
    }

    public function userCards($id, Request $request)
    {
        $cards = Card::where('user_id', '=', $id)->get();

        if (empty($cards)) {
            return $this->sendResponse($cards->toArray(), 'Do not have item in cart!');
        }

        return $this->sendResponse($cards->toArray(), 'Cards retrieved successfully');
    }

    /**
     * Store a newly created Card in storage.
     * POST /cards
     *
     * @param CreateCardAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCardAPIRequest $request)
    {
        $input = $request->all();
        $card = Card::where([
            ['equipment_id', '=', $input['equipment_id']],
            ['user_id', '=', $input['user_id']],
        ])->first();
        if (empty($card)) {
            $card = $this->cardRepository->create($input);
        } else {
            $input['num']=$input['num']+$card->num;
            $card = $this->cardRepository->update($input, $card->id);
        }

        $card = Card::where(
            'user_id', '=', $input['user_id']
        )->get();

        return $this->sendResponse($card->toArray(), 'Card saved successfully');
    }

    /**
     * Display the specified Card.
     * GET|HEAD /cards/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Card $card */
        $card = $this->cardRepository->find($id);

        if (empty($card)) {
            return $this->sendError('Card not found');
        }

        return $this->sendResponse($card->toArray(), 'Card retrieved successfully');
    }

    /**
     * Update the specified Card in storage.
     * PUT/PATCH /cards/{id}
     *
     * @param int $id
     * @param UpdateCardAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCardAPIRequest $request)
    {
        $input = $request->all();

        /** @var Card $card */
        $card = $this->cardRepository->find($id);

        if (empty($card)) {
            return $this->sendError('Card not found');
        }

        $card = $this->cardRepository->update($input, $id);

        return $this->sendResponse($card->toArray(), 'Card updated successfully');
    }

    /**
     * Remove the specified Card from storage.
     * DELETE /cards/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Card $card */
        $card = $this->cardRepository->find($id);

        if (empty($card)) {
            return $this->sendError('Card not found');
        }

        $card->delete();

        return $this->sendResponse($id, 'Card deleted successfully');
    }
}
